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


    if ($newAppDate > $newExpDate) {
        $_SESSION['errorDate'] = "The batch would have expired by then! Please choose a different date";
        header("Location: " . $_SESSION['selectDate_page']);
    } else {
        $sql = mysqli_query($conn, "SELECT count(*) as total from vaccination");
        $result = mysqli_fetch_assoc($sql);

        $query = "INSERT INTO vaccination(appointmentDate, status, username, batchNo)
  VALUES('$newAppDate', '$status', '$username','$batchNo');";

        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo '<script>alert("Vaccination appointment made");</script>';
        } else {
            echo '<script>alert("Unsuccessful");</script>';
        }
    }
}
