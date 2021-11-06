<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Booking Success</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Booking info area-->
<div class="container my-5 booking-info">
    <div class="card text-center booking-success-card">
        <i class="fas fa-check-circle"></i>
        <div class="card-body">
            <h1 class="card-title mt-3 success-title">Success</h1>
            <p class="card-text mb-4">The appointment has been booked. Please wait 1-3 working days for an email
                regarding the status of your appointment
            </p>
            <div class="d-flex flex-column">
                <ul>
                    <li class="font-weight-bold">Vaccination ID</li>
                    <li>VAX<?php echo $_SESSION['vaccinationID'] ?></li>
                </ul>
                <ul>
                    <li class="font-weight-bold">Status</li>
                    <li>Pending</li>
                </ul>
            </div>
            <a href="viewAppointment.php" class="btn btn-info my-3">View Appointment</a>
        </div>
    </div>
</div>
<!--Footer-->
<?php include 'footer.php'; 
unset($_SESSION['vaccinationID']);?>
<script src="js/scripts.js"></script>