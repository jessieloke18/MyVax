<!--Header and dbconnect-->
<?php 
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Available Vaccines</title>

<body onload = displayVaccines()>
  <!--Navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="../images/logowhite1.png" alt="MyVax Logo" width="110" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Lim Jia Yi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Edit Profile</a>
              <a class="dropdown-item" href="index.html">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Banner-->
  <div class="container-fluid d-flex justify-content-center align-items-center available-vaccine-banner">
    <h1 class="banner-title">Available Vaccines</h1>
  </div>
  <!--Vaccine table-->
  <div class="container available-vac-container">
    <table class="table table-striped mt-5 mb-5">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Vaccine Name</th>
          <th scope="col">Manufacturer</th>
        </tr>
      </thead>
      <tbody id="vaccine-table-body">
         <!--function displayVaccine will be called here-->
      </tbody>
    </table>
    <!--Search bar-->
    <div class="row mb-0">
      <div
        class="com-sm-11 col-md-7 search-vaccine-section d-flex justify-content-center align-items-center flex-column text-center">
        <h2 id="choice-title">Made your choice?</h2>
        <p>Find our which healthcare centres are offering your preferred vaccines</p>
        <div class="alert alert-warning fade show" role="alert" id="search-alert">
          <strong>Oops!</strong> That vaccine does not exist.
        </div>
        <div class="input-group mb-3 w-75">
          <input type="text" class="form-control" placeholder="Enter vaccine ID" aria-label="enteredVaccine"
            aria-describedby="enteredVaccine" id="enteredVaccine">
          <div class="input-group-append">
            <a href="#" class="btn btn-info" id="searchVaccine" onclick=searchVaccine()>Search</a>
          </div>
        </div>
      </div>
      <div class="col-sm-1 col-md-5 smiling-doc">
        <img src="../images/smilingdoctorbg.png" alt="Smiling male doctor" width="560" height="380">
      </div>
    </div>
  </div>

<!--Footer-->
<?php include 'footer.php';?>
<script src="js/scripts.js"></script>