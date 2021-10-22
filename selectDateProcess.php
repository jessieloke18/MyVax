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
            $sql = "SELECT vaccinationID FROM vaccination WHERE username ='$username' AND appointmentDate ='$newAppDate'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['vaccinationID'] = $row["vaccinationID"];

            $query = "UPDATE batch SET quantityAvailable = quantityAvailable-1, quantityPending = quantityPending+1 WHERE batchNo = '$batchNo'";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo "<script>window.location.href='bookingSuccess.php?" . $_SESSION['vaccinationID'] . "'</script>";
                
    $to = 'jessieloke18@gmail.com'; 
    $subject = 'Customer Inquiry';
    $body = "Bodysdisds";
    $headers = "From: sender\'s email";


    if (mail ($to, $subject, $body, $headers)) 
    { 
        echo '<p>Your message has been sent!</p>';
    } 
    else 
    { 
        echo '<p>Something went wrong, go back and try again!</p>'; 
    }
            }
        } else {
            echo '<script>alert("Unsuccessful");</script>';
        }
    }
}


   


?>
