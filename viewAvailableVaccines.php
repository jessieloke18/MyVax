<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Available Vaccines</title>
<link rel="stylesheet" href="css/jessie.css">
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
                <th scope="col">Manufacurer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">V00001</th>
                <td>Pfizer</td>
                <td>BioNTech</td>
            </tr>
            <tr>
                <th scope="row">V00002</th>
                <td>AstraZeneca</td>
                <td>AZ Inc</td>

            </tr>
            <tr>
                <th scope="row">V00003</th>
                <td>Moderna</td>
                <td>Moderna Inc</td>
            </tr>
            <tr>
                <th scope="row">V00004</th>
                <td>Sinovac</td>
                <td>Sinovac Biotech Ltd</td>
            </tr>
        </tbody>
    </table>
    <!--Search bar-->
    <form method="POST" action="selectCentres.php">
        <div class="row mb-0">
            <div class="com-sm-11 col-md-7 search-vaccine-section d-flex justify-content-center align-items-center flex-column text-center">
                <h2 id="choice-title">Made your choice?</h2>
                <p>Find our which healthcare centres are offering your preferred vaccines</p>
                <div class="alert alert-warning fade show" role="alert" id="search-alert">
                    <strong>Oops!</strong> That vaccine does not exist.
                </div>

                <div class="input-group mb-3 w-75">
                    <input type="text" class="form-control" placeholder="Enter vaccine ID" aria-label="enteredVaccine" aria-describedby="enteredVaccine" id="enteredVaccine">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info" id="searchVaccine" name="search"onclick=searchVaccine()>Search</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-5 smiling-doc">
                <img src="images/smilingdoctorbg.png" alt="Smiling male doctor" width="560" height="380">
            </div>
        </div>
    </form>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>