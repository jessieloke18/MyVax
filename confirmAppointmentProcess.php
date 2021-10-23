<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['confirm-appointment'])) {
    $status = "Confirmed";
    $vaccinationID = "00073"; //dummy value
    $batchNo = "B00003"; //dummy value

    $query = "UPDATE batch, vaccination 
    SET batch.quantityPending = batch.quantityPending-1,
    vaccination.status = '$status'
    WHERE batch.batchNo = '$batchNo' AND
    vaccination.vaccinationID = '$vaccinationID'";
    $query_run = mysqli_query($conn, $query);

    //retrieve patient's email
    $query = "SELECT email 
    FROM user AS u
    JOIN vaccination AS va
    ON u.username = va.username
    WHERE vaccinationID ='$vaccinationID'";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);
    $email = $row["email"];

    if ($query_run) {
        echo '<script>alert("Successful");</script>';
        //send automated email to patient
        $to = "$email";
        $subject = 'MyVax Appointment- VAX' . "$vaccinationID";
        $message = "Hello!\n\nYour appointment has been confirmed. Please attend your appointment on the scheduled date\n\nMyVax";
        $headers = "From: jessieloke18@gmail.com\r\nReply-To: jessieloke18@gmail.com";
        $mail_sent = @mail($to, $subject, $message, $headers);
        //echo $mail_sent ? "Mail sent" : "Mail failed";
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }
}
