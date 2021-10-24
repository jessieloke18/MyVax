<!--Header and dbconnect-->
<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Select Centre</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Banner-->
<div class="container-fluid d-flex justify-content-center align-items-center healthcare-centre-banner">
    <h1 class="banner-title">Healthcare Centres</h1>
</div>
<!--List of hospitals offering the searched vaccine-->
<div class="container my-5 centre-container" onmouseover=hospitalNameBold()>
    <div class="list-group mt-5 mb-5" id="hospital-list-group">
        <?php
        if (isset($_POST['search-button'])) {
            $selectedVaccine = $_POST['vaccineList'];
            //join batch and healthcare centre tables to retrieve both centreName and centreAddress
            $sql = "SELECT DISTINCT hc.centreAddress, b.centreName 
            FROM batch AS b
            JOIN healthcarecentre AS hc ON b.centreName = hc.centreName 
            WHERE vaccineID = '$selectedVaccine'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                    echo '<a href="selectBatch.php?centreName='.$row["centreName"].'&vaccineID='.$selectedVaccine.'" class="list-group-item list-group-item-action hospital-block">'?>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 hospital-name"><?php echo $row["centreName"]; ?></h5>
                            <small> <i class="fas fa-chevron-right"></i>View Batches</small>
                        </div>
                        <p class="mb-1"><?php echo $row["centreAddress"]; ?></p>
                    </a>
        <?php
                }
            } else if($_POST['vaccineList']=="notSelected"){

                echo '<div class="alert alert-info" role="alert">';
                echo "Please select a vaccine!";
                echo '</div>';
            }
            else{
                echo '<div class="alert alert-info" role="alert">';
                echo "There are currently no healthcare centres offering this vaccine!";
                echo '</div>';
            }

        }
        ?>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="javascript:history.back()" class="btn btn-info"><i class="fas fa-chevron-left"></i>More vaccines</a>
    </div>
</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>