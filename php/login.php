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
  <title>Login</title>
</head>

<body class="login-body-bg">
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
          <a class="nav-link" href="index.html">Home</a>
          <a class="nav-link" href="signup.html">Sign Up</a>
          <a class="nav-link" href="login.html">Login</a>
        </div>
      </div>
    </div>
  </nav>
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
          <p class="pt-4 pb-3 text-center"><small>New here? <a href="signup.html">Sign up now</a></small></p>

        </form>
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
  <script src="../js/scripts.js"></script>
</body>

</html>