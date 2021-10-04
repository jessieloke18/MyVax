<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jessie.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Sign Up</title>
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="../images/logowhite1.png" alt="MyVax Logo" width="110"
          height="50"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="signup.html">Sign Up</a>
          <a class="nav-link" href="login.html">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!--Sign up form area-->
  <div class="container signup-container">
    <div class="row">
      <!--Alert message for successful account creation-->
      <div class="alert alert-info alert-dismissible fade show" role="alert" id="account-success">
        <strong>Congratulations!</strong> Your account has been created.
        Please proceed to the <a href="login.html">login </a>page to begin your journey with MyVax
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 col-lg-5 signup-form-column">
        <h1 class="text-center pt-5 sign-up-title">Sign Up</h1>
        <div class="row px-4">
          <div class="col-6">
            <button type="submit" class="btn btn-outline-info mt-4" id="admin-signup" onclick=adminSelected()>As
              Admin</button>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-outline-info mt-4" id="patient-signup" onclick=patientSelected()>As
              Patient</button>
          </div>
        </div>
        <form class="signup-form">
          <div id="centre">
            <div class="form-check form-check-inline py-3">
              <input class="form-check-input" type="radio" name="radioCentre" id="existingCentre" value="option1"
                checked onclick=selectCentre()>
              <label class="form-check-label" for="existingCentre">Existing Centre</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="radioCentre" id="newCentre" value="option2"
                onclick=selectCentre()>
              <label class="form-check-label" for="newCentre">New Centre</label>
            </div>

            <div class="form-group" id="selectExistingCentre">
              <select class="form-control" id="listOfCentres" onchange="changeAddress()" required>
                <option value="">Select a healthcare centre</option>
                <option value="1">IMU Healthcare</option>
                <option value="2">Sunway Velocity Medical Centre</option>
                <option value="3">Pantai Hospital</option>
              </select>
              <div id="selected-centre-address"></div>

            </div>

            <div id="addCentre">
              <div class="form-group">
                <label for="newCentreName">Centre Name</label>
                <input type="text" class="form-control" id="newCentreName" placeholder="Enter your centre name"
                  aria-describedby="newCentreName" required>
              </div>
              <div class="form-group">
                <label for="newCentreAddress">Centre Address</label>
                <input type="text" class="form-control" id="newCentreAddress" placeholder="Enter your centre address"
                  aria-describedby="newCentreAddress" required>
              </div>
            </div>

            <div class="form-group">
              <label for="staffID">Staff ID</label>
              <input type="staffID" class="form-control" id="staffID" placeholder="Enter your staff ID"
                aria-describedby="staffID" required>
            </div>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username"
              aria-describedby="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
          </div>
          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="fullName" class="form-control" id="fullName" placeholder="Enter your full name" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email address"
              aria-describedby="email" required>

          </div>

          <div class="form-group" id="ic-passport">
            <label for="staffID">IC/Passport</label>
            <input type="ICPassport" class="form-control" id="ICPassport" placeholder="Enter your IC or passport"
              aria-describedby="ICPassport" required>
          </div>

          <div class="d-flex justify-content-center align-items-center flex-column">
            <button type="submit" class="btn btn-info submit-btn mt-5" onclick=signUpValidation()>Submit</button>
            <p class="pt-4 pb-3"><small>Already have an account? <a href="login.html">Log in here</a></small></p>
          </div>

        </form>

      </div>
      <div class="col-md-5 col-lg-7" id="signup-pic"></div>
    </div>
  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
  <script src="../js/scripts.js"></script>
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
            <li class="contact-item"><i class="fas fa-map-marker-alt"></i>100, Jalan Tun Razak, Kuala Lumpur</li>
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