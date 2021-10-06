<?php
session_start();
include 'dbconnect.php';

    if (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        echo "<script>window.location.href='index.php';</script>";
}
?>