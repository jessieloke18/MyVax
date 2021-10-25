<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
//save the current page in a session so that if appointmentdate>expirydate, can be returned to this page
$_SESSION['selectDate_page'] = $_SERVER['REQUEST_URI']
?>
<title>Select Date</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Banner-->
<div class="container-fluid d-flex justify-content-center align-items-center batch-banner">
    <h1 class="banner-title">Schedule Appointment</h1>
</div>
<!--Batch info-->
<div class="container batch-info">
    <!--If errorDate session is set, display error message-->
    <?php
    if (isset($_SESSION['errorDate'])) {
    ?>
        <div class="alert alert-danger alert" role="alert" id="date-alert">
            <strong>Oops!</strong> <?php echo $_SESSION['errorDate'] ?>
        </div>
    <?php } ?>
    <div class="row">
        <?php
        if (isset($_GET['batchNo'])) {
            $batchNo = $_GET["batchNo"];
            $_SESSION['batchNo'] = $batchNo;
            $sql = "SELECT* FROM batch where batchNo ='$batchNo'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-md-5 pt-5">
                    <ul>
                        <li class="font-weight-bold">Vaccine Name</li>
                        <li> <?php echo $_SESSION["vaccineName"] ?></li>
                    </ul>
                    <ul>
                        <li class="font-weight-bold">Centre Name</li>
                        <li><?php echo $_SESSION["centreName"] ?></li>
                    </ul>
                    <ul>
                        <li class="font-weight-bold">Batch Number</li>
                        <li><?php echo $row["batchNo"]; ?></li>
                    </ul>
                    <ul>
                        <li class="font-weight-bold">Batch Expiry Date</li>
                        <li id="batch-expiry-date" data-value="<?php echo $row["expiryDate"]; ?>">
                            <?php echo date("d/m/Y", strtotime($row["expiryDate"])) ?></li>
                        <!--saving exp date in a session-->
                        <?php
                        $_SESSION['expiryDate'] = $row["expiryDate"];
                        ?>
                    </ul>
                    <ul>
                        <li class="font-weight-bold">Quantity Available</li>
                        <li><?php echo $row["quantityAvailable"]; ?></li>
                    </ul>
                </div>
        <?php }
        }
        ?>

        <div class="col-md-7 d-flex justify-content-center">
            <form action="selectDateProcess.php" method="POST" id="appointmentForm" class="d-flex justify-content-center align-items-center flex-column">
                <p class="text-center">Please select an upcoming date for your vaccination appointment</p>
                <div class="input-group mb-3 w-75">
                    <input data-date-format="dd/mm/yyyy" id="datepicker" name="appointmentDate" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-info" id="selectDate" data-toggle="modal" data-target="#staticBackdrop">Request</button>
                    </div>
                </div>
                <!-- Appointment confirmation modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Appointment confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure? You may not cancel the appointment after it has been made.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info" form="appointmentForm" name="appointment-submit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="row d-flex justify-content-center">
        <a href="javascript:history.back()" class="btn btn-info mt-3"><i class="fas fa-chevron-left"></i>More batches</a>
    </div>
</div>

<!--Footer-->
<?php include 'footer.php';
unset($_SESSION['errorDate']);
?>
<script src="js/scripts.js"></script>