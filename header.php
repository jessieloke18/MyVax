<?php
include 'dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Datepicker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
</head>

<body>

  <!--If username session is not set, use these nav links-->
  <?php
  if (!isset($_SESSION['username'])) { ?>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logowhite1.png" alt="MyVax Logo" width="110" height="50"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="signupPatient.php">Sign Up</a>
            <a class="nav-link" href="login.php">Login</a>
          </div>
        </div>
      </div>
    </nav>
    <!--If username session is set, use these nav links-->
  <?php } else { ?>

    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logowhite1.png" alt="MyVax Logo" width="110" height="50"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <?php
            $username = $_SESSION['username'];
            $result = mysqli_query($conn, "SELECT* FROM user WHERE username='$username'");
            $row = mysqli_fetch_assoc($result);
            $navItem;
            //if user is an admin, have "Dashboard" in the navbar; if user is a patient, have "Contact Us" instead
            if ($row['userType'] == "admin")
              $navItem = '<a class="nav-link" href="administrator_dashboard.php">Dashboard</a>';
            else
              $navItem = '<a class="nav-link" href="#">Contact Us</a>';
            ?>
            <li class="nav-item">
              <?php echo $navItem ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $row['fullName'] ?>
              </a>
              <form action="logout.php" method="POST">
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Edit Profile</a>
                  <input type="submit" class="dropdown-item" name="logout" value="Logout">

                </div>
              </form>

            </li>
          </ul>
        </div>

      </div>
    </nav>

  <?php }
