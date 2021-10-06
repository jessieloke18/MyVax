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
    include 'header.php';
}
?>
<link rel="stylesheet" href="css/jessie.css">
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
      <form class="signup-form-admin" action="signup.php" method="POST">
        <div class="form-check form-check-inline py-3">
          <input class="form-check-input" type="radio" name="radioCentre" id="existingCentre" value="existingCentre" checked onclick=selectCentre()>
          <label class="form-check-label" for="existingCentre">Existing Centre</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="radioCentre" id="newCentre" value="newCentre" onclick=selectCentre()>
          <label class="form-check-label" for="newCentre">New Centre</label>
        </div>


        <div class="form-group" id="selectExistingCentre">
          <select class="form-control" id="listOfCentres" name="listOfCentres" onclick="changeAddress()" required>
            <option value="">Select a healthcare centre</option>
            <?php
            $res = mysqli_query($conn, "SELECT* FROM healthcarecentre");
            while ($row = mysqli_fetch_array($res)) {
            ?>
              <option value="<?php echo $row["centreAddress"]; ?>"><?php echo $row["centreName"] ?></option>
            <?php
            }
            ?>
          </select>
          <div id="selected-centre-address"></div>

        </div>

        <div id="addCentre">
          <div class="form-group">
            <label for="newCentreName">Centre Name</label>
            <input type="text" class="form-control" id="newCentreName" name="centreName" placeholder="Enter your centre name" minlength="8">
          </div>
          <div class="form-group">
            <label for="newCentreAddress">Centre Address</label>
            <input type="text" class="form-control" id="newCentreAddress" name="centreAddress" placeholder="Enter your centre address">
          </div>
        </div>

        <div class="form-group">
          <label for="staffID">Staff ID</label>
          <input type="staffID" class="form-control" id="staffID" name="staffID" placeholder="Enter your staff ID" minlength="5" required>
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" minlength="5" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" minlength="5" required>
        </div>
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="fullName" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" minlength="5" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
        </div>
        <input type="hidden" name="userType" value="admin">
        <div class="d-flex justify-content-center align-items-center flex-column">
          <button type="submit" class="btn btn-info submit-btn mt-5" name="admin-submit" onclick=signUpValidation()>Submit</button>
          <p class="pt-4 pb-3"><small>Already have an account? <a href="login.html">Log in here</a></small></p>
        </div>

      </form>

      <!-- patient form -->
      <form class="signup-form-patient" action="signup.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" aria-describedby="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="fullName" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" aria-describedby="email" required>
        </div>

        <div class="form-group" id="ic-passport">
          <label for="staffID">IC/Passport</label>
          <input type="ICPassport" class="form-control" id="ICPassport" name="ICPassport" placeholder="Enter your IC or passport" aria-describedby="ICPassport" required>
        </div>
        <input type="hidden" name="userType" value="patient">

        <div class="d-flex justify-content-center align-items-center flex-column">
          <button type="submit" class="btn btn-info submit-btn mt-5" name="patient-submit" onclick=signUpValidation()>Submit</button>
          <p class="pt-4 pb-3"><small>Already have an account? <a href="login.php">Log in here</a></small></p>
        </div>

      </form>
    </div>
    <div class="col-md-5 col-lg-7" id="signup-pic"></div>
  </div>

</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<?php
$username = '';
$password = '';
$email = '';
$fullName = '';
$ICPassport = '';
$centreName = '';
$centreAddress = '';
$staffID = '';
$userType= '';

if (isset($_POST['patient-submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $fullName = $_POST['fullName'];
  $ICPassport = $_POST['ICPassport'];
  $userType = $_POST['userType'];

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
} else if (isset($_POST['admin-submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $fullName = $_POST['fullName'];
  $centreName = $_POST['centreName'];
  $centreAddress = $_POST['centreAddress'];
  $staffID = $_POST['staffID'];
  $centre = $_POST['radioCentre'];
  $userType = $_POST['userType'];

  if ($centre == "existingCentre") {
    if (isset($_POST['listOfCentres']))
      $centreName = $_POST['listOfCentres'];
    $query = "INSERT INTO user(username, password, email, fullName, userType)
        VALUES('$username','$password', '$email','$fullName', '$userType');";
    $query .= "INSERT INTO healthcareadministrator(username, staffID, centreName)
        VALUES('$username','$staffID', '$centreName')";
  } else {
    $query = "INSERT INTO user(username, password, email, fullName, userType)
      VALUES('$username','$password', '$email','$fullName', '$userType');";
    $query .= "INSERT INTO healthcarecentre(centreName, centreAddress)
            VALUES('$centreName','$centreAddress');";

    $query .= "INSERT INTO healthcareadministrator(username, staffID, centreName)
            VALUES('$username','$staffID', '$centreName')";
  }

  $query_run = mysqli_multi_query($conn, $query);
  if ($query_run) {
    echo '<script>accountSuccessMessage();</script>';
  } else {
    echo '<script>alert("Unsuccessful");</script>';
    printf("error: %s\n", mysqli_error($conn));
  }
}
?>