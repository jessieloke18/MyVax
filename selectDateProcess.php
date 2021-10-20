<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['appointment-submit'])) {

    $appointmentDate = $_POST['appointmentDate'];
    $status = "Pending";
    $username = $_SESSION['username'];
    $batchNo = $_SESSION['batchNo'];
    $expiryDate = $_SESSION['expiryDate'];
    $appDate = str_replace('/', '-', $appointmentDate);
    $newAppDate = date("Y-m-d", strtotime($appDate));
    $expDate = str_replace('/', '-', $expiryDate);
    $newExpDate = date("Y-m-d", strtotime($expDate));

    //check to see if appointment date is after expiry date
    if ($newAppDate > $newExpDate) {
        $_SESSION['errorDate'] = "The batch would have expired by then! Please choose a different date";
        header("Location: " . $_SESSION['selectDate_page']);
    } else {

        $query = "INSERT INTO vaccination(appointmentDate, status, username, batchNo)
  VALUES('$newAppDate', '$status', '$username','$batchNo');";

        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $sql = mysqli_query($conn, "SELECT vaccinationID FROM vaccination WHERE username ='$username' AND appointmentDate ='$newAppDate'");
            $result = mysqli_fetch_assoc($sql);
            $_SESSION['vaccinationID']=$result['vaccinationID'];
            echo "<script>window.location.href='bookingSuccess.php?".$_SESSION['vaccinationID']."'</script>";

        } else {
            echo '<script>alert("Unsuccessful");</script>';
        }
    }
}
