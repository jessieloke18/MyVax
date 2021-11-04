<?php
session_start();
include_once 'dbconnect.php';

if (isset($_POST['submit'])) {
    $vaccinationID = $_SESSION["vaccinationID"];
    $remarks = $_POST['remarks'];
    $batchNo = $_SESSION['batchNo'];
    $sql = "UPDATE vaccination SET remarks = '$remarks', status = 'administered' WHERE vaccinationID = '$vaccinationID';";
    $sql .= "UPDATE batch SET quantityAdministered = quantityAdministered + 1 WHERE batchNo = '$batchNo';";
    $query_run = mysqli_multi_query($conn, $sql);
    if ($query_run) {
        echo '<script>alert("Vaccination administered successfully!");</script>';
        echo '<script>window.location.href="view_vaccination_info.php?batchNo=' . $batchNo . '";</script>';
    } else {
        echo '<script>alert("Unsuccessful!");</script>';
        printf("error: %s\n", mysqli_error($conn));
    }
}
