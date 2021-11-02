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
                <th scope="col">Vaccine ID</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Manufacturer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT* FROM vaccine";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['vaccineID'] ?></th>
                    <td><?php echo $row['vaccineName'] ?></td>
                    <td><?php echo $row['manufacturer'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!--Choose vaccine-->
    <form method="POST" action="selectCentre.php">
        <div class="row mb-0">
            <div class="com-sm-11 col-md-7 search-vaccine-section d-flex justify-content-center align-items-center flex-column">
                <h2 id="choice-title">Made your choice?</h2>
                <p>Find our which healthcare centres are offering your preferred vaccines</p>
                <div class="alert alert-danger fade show" role="alert" id="search-alert">
                    <strong>Oops!</strong> Please select a vaccine.
                </div>
                <div class="input-group d-flex justify-content-center">
                    <select class="custom-select" name="vaccineList" id="vaccineList">
                        <option value='notSelected' selected>Select a vaccineID</option>
                        <?php
                        $sql = "SELECT* FROM vaccine";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['vaccineID'] ?>"><?php echo $row['vaccineID'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info" id="searchVaccine" name="search-button">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-5 smiling-doc">
                <img src="images/smilingdoctorbg.png" alt="Smiling male doctor" width="560" height="380">
            </div>
        </div>
    </form>
</div>
<script>
    //if user clicks on the Search btn without selecting any vaccine, stop them from going 
    //to the next page and call function to display error msg
    document.getElementById("searchVaccine").addEventListener("click", function(event) {
        var selectedVaccine = document.getElementById("vaccineList");
        if (selectedVaccine.options[selectedVaccine.selectedIndex].value == "notSelected") {
            event.preventDefault();
            vaccineAlert();
        }
    });
</script>


<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>