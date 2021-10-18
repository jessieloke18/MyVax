<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Select Batch</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Banner-->
<div class="container-fluid d-flex justify-content-center align-items-center vaccine-batch-banner">
    <h1 class="banner-title">Vaccine Batches</h1>
</div>
<!--List of batches-->
<div class="container batch-container my-5">
    <div class="alert alert-warning alert-dismissible fade show mt-5 sign-in-alert" role="alert">
        <strong>Hey there!</strong> Please <a href="login.html">login </a> to continue
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row mt-5" id="cardBlocks">
        <div class="col-md-4">
            <div class="card batch-card">
                <a href="selectDate.html" class="batchNo">
                    <div class="card-body text-center">
                        <i class="fas fa-syringe"></i>
                        <h5 class="card-title pt-2">B000001</h5>
                    </div>
                    <div class="overlay">
                        <div class="text">Schedule appointment</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="javascript:history.back()" class="btn btn-info mt-3"><i class="fas fa-chevron-left"></i>More healthcare
            centres</a>
    </div>

</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>