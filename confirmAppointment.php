<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Confirm Appointment</title>
<link rel="stylesheet" href="css/jessie.css">

<!--Content of the vaccination appointment box-->
<div class="container my-5 px-5 py-5 appointment-info">
    <div class="row d-flex justify-content-center">
        <!--dummy value-->
        <h1 id="vax-id">VAX00001</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 order-sm-12 d-flex justify-content-center align-items-center">
            <i class="fas fa-user"></i>
        </div>
        <div class="col-sm-6 order-sm-1" id="patient-vaccination-info">
            <?php
            $sql = "SELECT fullName, ICPassport, b.batchNo, expiryDate, manufacturer, vaccineName, appointmentDate
                FROM user AS u
                JOIN patient AS p ON u.username = p.username
                JOIN vaccination AS va ON va.username = p.username
                JOIN batch AS b ON b.batchNo = va.batchNo
                JOIN vaccine AS v ON v.vaccineID = b.vaccineID
                WHERE vaccinationID = '00073'"; //dummy value
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <ul>
                    <li class="font-weight-bold">Full Name</li>
                    <li><?php echo $row['fullName'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">IC/Passport</li>
                    <li><?php echo $row['ICPassport'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Vaccine Batch Number</li>
                    <li><?php echo $row['batchNo'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Batch Expiry Date</li>
                    <li><?php echo $row['expiryDate'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Vaccine Manufacturer</li>
                    <li><?php echo $row['manufacturer'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Vaccine Name</li>
                    <li><?php echo $row['vaccineName'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Vaccination Date</li>
                    <li><?php echo $row['appointmentDate'] ?></li>
                </ul>
            <?php }
            ?>
        </div>
    </div>
    <form action="confirmAppointmentProcess.php" method="POST">
        <!-- Reject and confirm buttons -->
        <div class="row text-center my-3">
            <div class="col-sm-6">
                <button type="button" class="btn btn-danger reject-btn" data-toggle="modal" data-target="#rejectButton">Reject</button>
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-info confirm-btn" name="confirm-appointment">Confirm</button>
            </div>
        </div>
        <!-- Modal for entering remarks when reject button is clicked -->
        <div class="modal fade" id="rejectButton" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectButtonLabel">Reject Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rejectRemarks">Remarks</label>
                            <textarea class="form-control" placeholder="The reason is..." id="rejectRemarks" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn close-btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="reject-appointment">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>