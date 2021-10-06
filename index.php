<!--Header and dbconnect-->
<?php 
session_start();
include 'dbconnect.php';
?>

<?php
if (isset($_SESSION['username'])){
    include 'header-logged.php';
}
else{
    include 'header-index.php';
}
?>
  <!--Main banner-->
  <div id="main-banner">
    <div class="container-fluid d-flex justify-content-end align-items-center banner-content">
      <div class="row">
        <div class="col-6 offset-6">
          <h1 class="banner-title">Book your COVID-19 vaccination appointment today</h1>
          <a href="login.php" class="btn btn-info available-vax-btn">See what vaccine is available</a>
        </div>

      </div>
    </div>
  </div>
  <!--Admin sign up area-->
  <div class="container">
    <div class="row">
      <div class="col-lg-7" id="provider">
        <h1 class="banner-title">Are you a healthcare provider?</h1>
        <p>Sign up as an administrator for your healthcare centre to help manage your centre's vaccinations
        </p>
        <a href="signup.php" class="btn btn-info provider-btn">I'm a provider</a>
      </div>
      <div class="col-lg-5">
        <img src="images/doctor.png" alt="Healthcare provider" id="doctor-pic" width="620" height="450">
      </div>
    </div>
  </div>
   <!--How to book an appointment section-->
  <div class="container-fluid steps-container py-5">
    <div class="container steps-inner-container pt-5">
      <h1 class="text-center banner-title">How to book an appointment</h1>
      <div class="row my-5">
        <div class="col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body steps-card">
              <i class="fas fa-clipboard-list"></i>
              <h5 class="card-title mt-2 how-to">Register with us</h5>
              <p class="card-text">Firstly create an account with MyVax</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body steps-card">
              <i class="fas fa-syringe"></i>
              <h5 class="card-title mt-2 how-to">Decide on a vaccine</h5>
              <p class="card-text">Decide on your preferred vaccine</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body steps-card">
              <i class="fas fa-hospital"></i>
              <h5 class="card-title mt-2 how-to">Choose a centre & batch</h5>
              <p class="card-text">Choose the healthcare centre and batch of your choice</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body steps-card">
              <i class="fas fa-calendar-plus"></i>
              <h5 class="card-title mt-2 how-to">Schedule the vaccination</h5>
              <p class="card-text">Decide on a date to receive your vaccination</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Footer-->
<?php include 'footer.php';?>
