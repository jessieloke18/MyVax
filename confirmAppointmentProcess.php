<?php
session_start();
include 'dbconnect.php';

$vaccinationID = $_SESSION["vaccinationID"]; 
$batchNo = $_SESSION["batchNo"]; 
//retrieve info to be included in the email
$query = "SELECT fullName, email, appointmentDate, centreName, vaccineName
FROM user AS u
JOIN vaccination AS va
ON u.username = va.username
JOIN batch AS b
ON b.batchNo = va.batchNo
JOIN vaccine AS v
ON v.vaccineID = b.vaccineID
WHERE vaccinationID ='$vaccinationID'";
$query_run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($query_run);
$email = $row["email"];
$fullName = $row["fullName"];
$centreName = $row["centreName"];
$vaccineName = $row["vaccineName"];
$appointmentDate = date("d/m/Y", strtotime($row["appointmentDate"]));

//if admin chooses to confirm appointment
if (isset($_POST['confirm-appointment'])) {
    $status = "Confirmed";
    $query = "UPDATE batch, vaccination 
    SET batch.quantityPending = batch.quantityPending-1,
    vaccination.status = '$status'
    WHERE batch.batchNo = '$batchNo' AND
    vaccination.vaccinationID = '$vaccinationID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>window.location.href='view_vaccination_info.php?batchNo=$batchNo';</script>";
        $message = "Dear " . $fullName . ", \n\nYour appointment has been confirmed. Please attend the appointment on "
            . $appointmentDate . " at " . $centreName . " for your first dose of " . $vaccineName . "." .
            "\n\nSincerely, \nMyVax";
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }
    
//if admin chooses to reject appointment
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
        echo "<script>window.location.href='view_vaccination_info.php?batchNo=$batchNo';</script>";
        $message = "Dear " . $fullName . ", \n\nWe are sorry to inform you that your appointment has been rejected.\n\nReason: " . "$remarks" .  "\n\nSincerely, \nMyVax";
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }
}
//send automated email to patient
$to = "$email";
$subject = 'MyVax Appointment- VAX' . "$vaccinationID";
$headers = "From: officialmyvax@gmail.com\r\nReply-To: officialmyvax@gmail.com";
$mail_sent = @mail($to, $subject, $message, $headers);
//echo $mail_sent ? "Mail sent" : "Mail failed";