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
            //retrieve and store vaccinationID in session
            $query = "SELECT vaccinationID FROM vaccination WHERE username ='$username' AND appointmentDate ='$newAppDate'";
            $query_run = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($query_run);
            $_SESSION['vaccinationID'] = $row["vaccinationID"];

            //update quantityAvailable and quantityPending
            $query = "UPDATE batch SET quantityAvailable = quantityAvailable-1, quantityPending = quantityPending+1 WHERE batchNo = '$batchNo'";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo "<script>window.location.href='bookingSuccess.php?" . $_SESSION['vaccinationID'] . "'</script>";
                
            } else {
                echo '<script>alert("Unsuccessful");</script>';
            }
        } else {
            echo '<script>alert("Unsuccessful");</script>';
        }
    }
}
