<!--Header-->
<?php include 'header.php';?>
<link rel="stylesheet" href="css/jessie.css">
  <!--Login form area-->
  <div class="container login-container">
    <div class="row">
      <div class="col-lg-7 login-pic">
      </div>
      <div class="col-lg-5 login-form">
        <h1 class="text-center pt-5 login-title">Login</h1>
        <form class="login-form">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username"
              aria-describedby="username">
              <div id="validationUsername" class="invalid-feedback">
                Please enter a username.
              </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
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
          <a href="#" id="redirect-login" class="btn btn-info login-btn mt-5" onclick=loginValidationAndRedirect()>Login</a>
          <p class="pt-4 pb-3 text-center"><small>New here? <a href="signup.php">Sign up now</a></small></p>

        </form>
      </div>
    </div>
  </div>
  <!--Footer-->
<?php include 'footer.php';?>