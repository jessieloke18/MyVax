<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Login</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Login form area-->
<div class="container login-container">
  <div class="row">
    <!--Alert message for successful account creation-->
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalid-login">
      Invalid username and password combination. Please try again.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="col-lg-7 login-pic">
    </div>
    <div class="col-lg-5 login-form">
      <h1 class="text-center pt-5 login-title">Login</h1>
      <form class="login-form" action="login.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
          <div id="validationUsername" class="invalid-feedback">
            Please enter a username.
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          <div id="validationPassword" class="invalid-feedback">
            Please enter a password.
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="remember-me">
              <label class="form-check-label" for="remember-me"><small>Remember me</small></label>
            </div>
          </div>
          <div class="col text-right">
            <small><a href=#>Forgot password?</a></small>
          </div>
        </div>
        <button type="submit" class="btn btn-info login-btn mt-5" id="redirect-login" name="login-submit" onclick=loginValidation()>Login</button>
        <p class="pt-4 pb-3 text-center"><small>New here? <a href="signup.php">Sign up now</a></small></p>

      </form>
    </div>
  </div>
</div>
<!--Footer-->
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['login-submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT* FROM user WHERE username='$username' AND password='$password'";
  $query_run = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($query_run);

  if ($result !== null && $result['userType'] == "admin") {
    $_SESSION['username'] = $username;
    echo "<script>window.location.href='administrator-dashboard.php';</script>";
  } else if ($result !== null && $result['userType'] == "patient") {
    $_SESSION['username'] = $username;
    echo "<script>window.location.href='index.php';</script>";
  } else {
    echo '<script>invalidLoginMessage();</script>';
  }
}


?>