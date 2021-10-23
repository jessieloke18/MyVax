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

    if ($query_run) {
        echo '<script>alert("Successful");</script>';
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }
}