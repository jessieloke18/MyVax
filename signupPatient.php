<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<link rel="stylesheet" href="css/jessie.css">
<title>Sign Up</title>
<!--Sign up form area-->
<div class="container signup-container">
  <div class="row">
    <!--Alert message for successful account creation-->
    <div class="alert alert-info alert-dismissible fade show" role="alert" id="account-success">
      <strong>Congratulations!</strong> Your account has been created.
      Please proceed to the <a href="login.php">login </a>page to begin your journey with MyVax
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!--Alert message for duplicate username-->
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="duplicate-username">
      <strong>Woops!</strong> This username already exists. Please use a different username
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  <!--Sign Up form area-->
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
      <!-- patient form -->
      <form class="signup-form-patient" action="signupPatient.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="Enter your username" minlength="5" required>
          <div class="invalid-feedback">
            Please enter a valid username.
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>" placeholder="Enter your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{5,20}$" minlength="5" required>
          <div class="invalid-feedback">
            Must contain at least one lowercase letter, one uppercase letter and one number
          </div>

        </div>
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="fullName" class="form-control" id="fullName" name="fullName" value="<?php echo isset($_POST["fullName"]) ? $_POST["fullName"] : ''; ?>" placeholder="Enter your full name" minlength="5" required>
          <div class="invalid-feedback">
            Please enter a valid full name.
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="Enter your email address" minlength="5" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>

        <div class="form-group" id="ic-passport">
          <label for="staffID">IC/Passport</label>
          <input type="ICPassport" class="form-control" id="ICPassport" name="ICPassport" value="<?php echo isset($_POST["ICPassport"]) ? $_POST["ICPassport"] : ''; ?>" placeholder="Enter your IC or passport" minlength="5" required>
          <div class="invalid-feedback">
            Please enter a valid IC or passport number.
          </div>
        </div>
        <input type="hidden" name="userType" value="patient">

        <div class="d-flex justify-content-center align-items-center flex-column">
          <button type="submit" class="btn btn-info submit-btn mt-5" name="patient-submit" onclick=signUpValidation()>Submit</button>
          <p class="pt-4 pb-3"><small>Already have an account? <a href="login.php">Log in here</a></small></p>
        </div>

      </form>
    </div>
    <div class="col-md-5 col-lg-7" id="signup-pic-patient"></div>
  </div>

</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>
<!--form action-->
<?php
if (isset($_POST['patient-submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $fullName = $_POST['fullName'];
  $ICPassport = $_POST['ICPassport'];
  $userType = $_POST['userType'];

  $sql = mysqli_query($conn, "SELECT* FROM user WHERE username='$username'");
  if (mysqli_num_rows($sql) >= 1) {
    echo '<script>duplicateUsername();</script>';
  } else {

    $query = "INSERT INTO user(username, password, email, fullName, userType)
    VALUES('$username','$password', '$email','$fullName', '$userType');";
    $query .= "INSERT INTO patient(username, ICPassport)
    VALUES('$username','$ICPassport')";
    $query_run = mysqli_multi_query($conn, $query);

    if ($query_run) {
      echo '<script>accountSuccessMessage();</script>';
    } else {
      echo '<script>alert("Unsuccessful");</script>';
      printf("error: %s\n", mysqli_error($conn));
    }
  }
}
?>