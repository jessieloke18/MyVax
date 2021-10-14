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
    
    $checkDupBatch = mysqli_query($conn, "SELECT * FROM batch WHERE batchNo = '$batchNo'");
    if(mysqli_num_rows($checkDupBatch) >= 1){
        echo '<script>alert("Batch number already exists!");</script>';
        echo "<script>window.location.href='record_new_vaccine_batch.php';</script>";

    } else{
    $sql = "INSERT INTO batch VALUES ('$batchNo','$dateFormatted',$numDoses, 0, 0, '$vacID', '$centreName')";
    
    $query_run = mysqli_multi_query($conn, $sql);
    if ($query_run) {
        echo '<script>alert("Successful");</script>';
        echo "<script>window.location.href='administrator_dashboard.php';</script>";
        } else {
        echo '<script>alert("Unsuccessful");</script>';
        printf("error: %s\n", mysqli_error($conn));
        }
    }
    
}

    

    
