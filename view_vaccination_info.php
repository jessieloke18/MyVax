<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>View Vaccination Info</title>
<link rel="stylesheet" href="css/zhaoyao.css">
<script src="https://kit.fontawesome.com/2310cb5c3b.js" crossorigin="anonymous"></script>

<h2 class="mt-5 font-weight-bold">Vaccinations In This Batch</h2>

<!-- A section to show information about current batch -->
<?php
if (isset($_GET['batchNo'])){
  $batchNo = mysqli_real_escape_string($conn, $_GET['batchNo']);
  $sql = "SELECT * FROM batch where batchNo = '$batchNo'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION["batchNo"] = $batchNo;
}
?>
<div class="container border info-section mt-5">
  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">No. Of Pending Vaccination:</p>
      <p id="pending"><?php echo $row['quantityPending']; ?></p>
    </div>
    <div class="col-md-6">
      <p class="font-weight-bold">Batch Expiry Date:</p>
      <p id="batchExDate"><?php echo $row['expiryDate']; ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">No. of Available Vaccination:</p>
      <p id="available"><?php echo $row['quantityAvailable']; ?></p>
    </div>
    <div class="col-md-6">
      <p class="font-weight-bold">No. of Administered Vaccination:</p>
      <p id="administered"><?php echo $row['quantityAdministered']; ?></p>
    </div>
  </div>

</div>

<!-- A table to show vaccinations inside current batch -->
<div class="container table-section mt-5">
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th scope="col">VaccinationID</th>
        <th scope="col">Appointment Date</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">VAX00001</th>
        <td>15/10/2021</td>
        <td>Pending</td>
        <td>
          <a href="confirmAppointment.html"><i class="fas fa-calendar-check"></i></a>
          <a href="record_vaccination_administered.html"><i class="fas fa-file-signature"></i></a>
        </td>
      </tr>
      <tr>
        <th scope="row">VAX00002</th>
        <td>24/11/2021</td>
        <td>Pending</td>
        <td>
          <a href="confirmAppointment.html"><i class="fas fa-calendar-check"></i></a>
          <a href="record_vaccination_administered.html"><i class="fas fa-file-signature"></i></a>
        </td>
      </tr>
      <tr>
        <th scope="row">VAX00003</th>
        <td>13/04/2021</td>
        <td>Confirmed</td>
        <td>
          <a href="confirmAppointment.html"><i class="fas fa-calendar-check"></i></a>
          <a href="record_vaccination_administered.html"><i class="fas fa-file-signature"></i></a>
        </td>
      </tr>
      <tr>
        <th scope="row">VAX00004</th>
        <td>02/01/2021</td>
        <td>Confirmed</td>
        <td class="d-flex justify-content-center">
          <a href="confirmAppointment.html"><i class="fas fa-calendar-check"></i></a>
          <a href="record_vaccination_administered.html"><i class="fas fa-file-signature"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- A selection box to select a vaccination and view details -->
<div class="container combo-section">
  <form>
    <div class="form-group row" style="margin:0 auto;">
      <label for="selectedVax" class="col-form-label col-sm-6">VaccinationID</label>
      <div class="col-sm-6">
        <select id="selectedVax" class="form-control" onchange="changeVax()" required>
          <option value="">Select a vaccineID to view details</option>
          <option value="1">VAX00001</option>
          <option value="2">VAX00002</option>
          <option value="3">VAX00003</option>
          <option value="4">VAX00004</option>
        </select>
      </div>
    </div>


  </form>
</div>

<!-- A section to show seleted vaccination's information -->
<div class="container border info-section">
  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">Patient Name:</p>
      <p id="pname"></p>
    </div>
    <div class="col-md-6">
      <p class="font-weight-bold">Patient IC/Passport:</p>
      <p id="vicpass"></p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">Batch Number:</p>
      <p id="vbatchno"></p>
    </div>
    <div class="col-md-6">
      <p class="font-weight-bold">Vaccine Name:</p>
      <p id="vname"></p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">Status:</p>
      <p id="vstatus"></p>
    </div>
  </div>
</div>

<!-- A button to go back to dashboard -->
<div class="container d-flex justify-content-center mt-5 mb-5">
  <a href="administrator_dashboard.html"><button class="btn button-pcvs btn-info">Back To Dashboard</button></a>
</div>


<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/zhaoyao.js"></script>