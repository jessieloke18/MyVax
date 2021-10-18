<!--Header and dbconnect-->
<?php
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
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //join batch and healthcare centre tables to retrieve both centreName and centreAddress
            $sql = "SELECT DISTINCT healthcarecentre.centreAddress, batch.centreName FROM batch JOIN healthcarecentre ON batch.centreName = healthcareCentre.centreName WHERE vaccineID = '$search'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a href="selectBatch.php?centreName=<?php echo $row["centreName"]; ?>" class="list-group-item list-group-item-action hospital-block">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 hospital-name"><?php echo $row["centreName"]; ?></h5>
                            <small> <i class="fas fa-chevron-right"></i>View Batches</small>
                        </div>
                        <p class="mb-1"><?php echo $row["centreAddress"]; ?></p>
                    </a>
        <?php
                }
            } else {

                echo '<div class="alert alert-info" role="alert">';
                echo "There are no results matching your search!";
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