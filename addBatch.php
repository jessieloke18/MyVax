<?php
    session_start();
    include_once 'dbconnect.php';
    
    if(isset($_POST['submit'])){
    $vacID = $_POST['vacID'];
    $expDate = $_POST['expDate'];
    $fixedDate = str_replace('/', '-', $expDate);
    $dateFormatted = date("Y-m-d", strtotime($fixedDate));
    $batchNo = $_POST['batchNo'];
    $numDoses = $_POST['numDoses'];
    $centreName = $_SESSION['centreName'];
    
    $sql = "INSERT INTO batch VALUES ('$batchNo','$dateFormatted',$numDoses, 0, '$vacID', '$centreName')";
    
    $query_run = mysqli_multi_query($conn, $sql);
    if ($query_run) {
        echo '<script>alert("Successful");</script>';
        echo "<script>window.location.href='administrator_dashboard.php';</script>";
        } else {
        echo '<script>alert("Unsuccessful");</script>';
        printf("error: %s\n", mysqli_error($conn));
        }
    
    
}

    

    
