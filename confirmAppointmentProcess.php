<?php
session_start();
include 'dbconnect.php';

$vaccinationID = "00073"; //dummy value
$batchNo = "B00003"; //dummy value

//retrieve patient's email
$query = "SELECT email 
FROM user AS u
JOIN vaccination AS va
ON u.username = va.username
WHERE vaccinationID ='$vaccinationID'";
$query_run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($query_run);
$email = $row["email"];

if (isset($_POST['confirm-appointment'])) {
    $status = "Confirmed";
    $query = "UPDATE batch, vaccination 
    SET batch.quantityPending = batch.quantityPending-1,
    vaccination.status = '$status'
    WHERE batch.batchNo = '$batchNo' AND
    vaccination.vaccinationID = '$vaccinationID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>alert("Successful");</script>';
        $message = "Hello!\n\nYour appointment has been confirmed. Please attend your appointment on the scheduled date\n\nMyVax";
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }

} else if (isset($_POST['reject-appointment'])) {
    $status = "Rejected";
    $remarks = $_POST['rejectRemarks'];
    $query = "UPDATE batch, vaccination 
    SET batch.quantityPending = batch.quantityPending-1,
    batch.quantityAvailable = batch.quantityAvailable+1,
    vaccination.remarks = '$remarks',
    vaccination.status = '$status'
    WHERE batch.batchNo = '$batchNo' AND
    vaccination.vaccinationID = '$vaccinationID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>alert("Successful");</script>';
        $message = "Sorry!\n\nYour appointment was rejected.\n\nReason: " . "$remarks" . "\n\nMyVax";
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }

}
//send automated email to patient
$to = "$email";
$subject = 'MyVax Appointment- VAX' . "$vaccinationID";
$headers = "From: jessieloke18@gmail.com\r\nReply-To: jessieloke18@gmail.com";
$mail_sent = @mail($to, $subject, $message, $headers);
//echo $mail_sent ? "Mail sent" : "Mail failed";
