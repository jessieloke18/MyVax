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
        <h1 id="vax-id">VAX00001</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 order-sm-12 d-flex justify-content-center align-items-center">
            <i class="fas fa-user"></i>
        </div>
        <div class="col-sm-6 order-sm-1" id="patient-vaccination-info">
            <ul>
                <li class="font-weight-bold">Full Name</li>
                <li>Lim Jia Yi</li>
            </ul>
            <ul>
                <li class="font-weight-bold">IC/Passport</li>
                <li>201118101234</li>
            </ul>
            <ul>
                <li class="font-weight-bold">Vaccine Batch Number</li>
                <li>B00001</li>
            </ul>
            <ul>
                <li class="font-weight-bold">Batch Expiry Date</li>
                <li>12/12/2021</li>
            </ul>
            <ul>
                <li class="font-weight-bold">Vaccine Manufacturer</li>
                <li>BioNTech</li>
            </ul>
            <ul>
                <li class="font-weight-bold">Vaccine Name</li>
                <li>Pfizer</li>
            </ul>
            <ul>
                <li class="font-weight-bold">Vaccination Date</li>
                <li>15/10/2021</li>
            </ul>
        </div>

    </div>
    <!-- Reject and confirm buttons -->
    <div class="row text-center my-3">
        <div class="col-sm-6">
            <button type="button" class="btn btn-danger reject-btn" data-toggle="modal" data-target="#rejectButton">Reject</button>
        </div>
        <div class="col-sm-6">
            <a href="view_vaccination_info.html" class="btn btn-info confirm-btn">Confirm</a>
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
                    <a href="view_vaccination_info.html" type="button" class="btn btn-info">Save</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>