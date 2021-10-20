<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['appointment-submit'])) {

    $appointmentDate = $_POST['appointmentDate'];
    $status = "Pending";
    $username = $_SESSION['username'];
    $batchNo = $_SESSION['batchNo'];
    $fixedDate = str_replace('/', '-', $appointmentDate);
    $dateFormatted = date("Y-m-d", strtotime($fixedDate));
    
    $sql = mysqli_query($conn, "SELECT count(*) as total from vaccination");
    $result = mysqli_fetch_assoc($sql);

$query = "INSERT INTO vaccination(appointmentDate, status, username, batchNo)
  VALUES('$dateFormatted', '$status', '$username','$batchNo');";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script>alert("Vaccination appointment made");</script>';
    } else {
        echo '<script>alert("Unsuccessful");</script>';
    }
}
