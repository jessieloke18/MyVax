<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>MyVax Home</title>
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="MyVax Logo" width="110" height="50"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="index.html">Home</a>
          <a class="nav-link" href="signup.html">Sign Up</a>
          <a class="nav-link" href="login.html">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!--Main banner-->
  <div id="main-banner">
    <div class="container-fluid d-flex justify-content-end align-items-center banner-content">
      <div class="row">
        <div class="col-6 offset-6">
          <h1 class="banner-title">Book your COVID-19 vaccination appointment today</h1>
          <a href="viewAvailableVaccine.html" class="btn btn-info available-vax-btn">See what vaccine is available</a>
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
        <a href="signup.html" class="btn btn-info provider-btn">I'm a provider</a>
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
 
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col">
          <ul>
            <li class="footer-header">Quick Links</li>
            <li class="quick-links-items"><a href="index.html">Home</a></li>
            <li class="quick-links-items"><a href="#">Contact Us</a></li>
            <li class="quick-links-items"><a href="#">Terms & Conditions</a></li>
            <li class="quick-links-items"><a href="#">Privacy Policy</a></li>
          </ul>

        </div>
        <div class="col">
          <ul>
            <li class="footer-header">Contact Us</li>
            <li class="contact-item"><i class="fas fa-map-marker-alt"></i>100, Jalan MyVax, Kuala Lumpur</li>
            <li class="contact-item"><i class="fas fa-phone-alt"></i>09123455677</li>
            <li class="contact-item"><i class="fas fa-envelope"></i>myvax-is-awesome@myvax.com</li>
          </ul>

        </div>
        <div class="col">
          <ul>
            <li class="footer-header">Get the latest updates</li>
            <li>
              <div class="input-group mb-3">
                <input type="text" class="form-control subscribe-email" placeholder="Email" aria-label="Email"
                  aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn subscribe" type="button" id="button-addon2">Subscribe</button>
                </div>
              </div>
            </li>
            <li>
              <div class="social-links">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
              </div>
            </li>
          </ul>

        </div>
      </div>
      <div id="copyright">
        <p>© All rights reserved by MyVax 2021</p>
      </div>
    </div>

  </footer>
</body>

</html>