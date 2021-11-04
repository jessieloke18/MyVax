<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Administrator Dashboard</title>
<link rel="stylesheet" href="css/zhaoyao.css">
<?php
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT* FROM healthcareadministrator WHERE username='$username'");
$row = mysqli_fetch_assoc($result);
$centreName =  $row['centreName'];
$_SESSION["centreName"] = $centreName;
?>
<div class="container" id="admin-alert">
    <div class="alert alert-info" role="alert">
        Hi Administrator <?php echo $username ?>. You are now managing: <?php echo $centreName ?>.
    </div>
</div>

<div class="container d-flex align-items-center" id="admin-functions" onmouseover="boldCardText()">
    <div class="row">
        <div class="col-6 col-lg-3 mb-3">
            <a href="record_new_vaccine_batch.php" class="card-links">
                <div class="card function-card h-100 rounded-0">
                    <img src="images/function4.jpg" class="card-img-top" alt="Record Vaccine Batch">
                    <div class="card-body">
                        <p class="card-text">
                            Record Vaccine Batch
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-lg-3 mb-3">
            <a href="view_vaccine_batch_info.php" class="card-links">
                <div class="card function-card h-100 rounded-0">
                    <img src="images/function3.jpg" class="card-img-top" alt="View Batch Info">
                    <div class="card-body">
                        <p class="card-text">
                            View Batch Info
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-lg-3 mb-3">
            <a href="#" class="card-links">
                <div class="card function-card h-100 rounded-0">
                    <img src="images/editprofile.jpg" class="card-img-top" alt="Manage Centre">
                    <div class="card-body">
                        <p class="card-text">
                            Manage Centre
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-lg-3 mb-3">
            <a href="#" class="card-links">
                <div class="card function-card h-100 rounded-0">
                    <img src="images/managepatients.jpg" class="card-img-top" alt="Manage Patients">
                    <div class="card-body">
                        <p class="card-text">
                            Manage Patients
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container mb-3" style="width:80%">
    <h5>Overview</h5>
</div>

<div class="container mb-5" style="width:80%">
    <div class="row">
        <div class="col-md-3">
            <div class="card overview-card bg-success">
                <div class="card-body d-flex flex-column">
                    <div class="ml-auto">
                        <i class="fas fa-syringe syringe-admin fa-2x" style="color:white !important; padding:0"></i>
                    </div>
                    <div class="mt-auto">
                        <p class="card-text" id="overview-text">Vaccinations <span class="badge badge-light badge-pill">110</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card overview-card bg-warning">
                <div class="card-body d-flex flex-column">
                    <div class="ml-auto">
                        <i class="far fa-list-alt fa-2x" style="color:white"></i>
                    </div>
                    <div class="mt-auto">
                        <p class="card-text" id="overview-text">Pending <span class="badge badge-light badge-pill">20</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card overview-card bg-danger">
                <div class="card-body d-flex flex-column">
                    <div class="ml-auto">
                        <i class="far fa-check-circle fa-2x" style="color:white"></i>
                    </div>
                    <div class="mt-auto">
                        <p class="card-text" id="overview-text">Administered <span class="badge badge-light badge-pill">89</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card overview-card bg-primary">
                <div class="card-body d-flex flex-column">
                    <div class="ml-auto">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="mt-auto">
                        <p class="card-text" id="overview-text">Users <span class="badge badge-light badge-pill">31</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/zhaoyao.js"></script>