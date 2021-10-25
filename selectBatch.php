<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
//save the current page in a session so that after logging in can be returned to this page
$_SESSION['batch_page'] = $_SERVER['REQUEST_URI']
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
        <strong>Hey there!</strong> Please <a href="login.php">login </a> to continue
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row mt-5" id="cardBlocks">
        <?php
        $currentDate = date('Y-m-d');
        if (isset($_GET['centreName'])) {
            $centreName = $_GET['centreName'];
            $vaccineID = $_GET['vaccineID'];
            $sql = "SELECT* FROM batch WHERE centreName ='$centreName' AND vaccineID ='$vaccineID' AND quantityAvailable>0 AND expiryDate>'$currentDate'";
            $result = mysqli_query($conn, $sql);
            $_SESSION["centreName"] = $centreName;
            $queryResult = mysqli_num_rows($result);
            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-md-4">
                        <!--Call the signInAlert() function if patient is not logged in and don't allow them to select a batch-->
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<div class="card batch-card" onclick="signInAlert()">';
                            echo '<a href="#">';
                            //if patient is logged in, they can select a batch
                        } else { ?>
                            <div class="card batch-card">
                                <a href="selectDate.php?batchNo=<?php echo $row["batchNo"]; ?>" class="batchNo">
                                <?php } ?>
                                <div class="card-body text-center">
                                    <i class="fas fa-syringe"></i>
                                    <h5 class="card-title pt-2"><?php echo $row["batchNo"]; ?></h5>
                                </div>
                                <div class="overlay">
                                    <div class="text">Schedule appointment</div>
                                </div>
                                </a>
                            </div>
                    </div>
        <?php }
                //if the healthcare centre does not have available batches
            } else {
                echo '<div class="alert alert-danger" role="alert">';
                echo "There are no available batches from this healthcare centre at the moment!";
                echo '</div>';
            }
        }
        ?>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="javascript:history.back()" class="btn btn-info mt-4"><i class="fas fa-chevron-left"></i>More healthcare
            centres</a>
    </div>

</div>
<?php
$sql = "SELECT* FROM vaccine WHERE vaccineID = '$vaccineID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["vaccineName"] = $row["vaccineName"];
?>
<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>