<?php include 'header.php';?>
<link rel="stylesheet" href="css/jessie.css">
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
<?php include 'footer.php';?>