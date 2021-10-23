<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Record Vaccination Administered</title>
<link rel="stylesheet" href="css/zhaoyao.css">
<script src="https://kit.fontawesome.com/2310cb5c3b.js" crossorigin="anonymous"></script>

<?php
if (isset($_GET['vaccinationID'])) {
  $vaccinationID = mysqli_real_escape_string($conn, $_GET['vaccinationID']);
  $_SESSION["vaccinationID"] = $vaccinationID;
  $sql = "SELECT u.fullName, p.ICPassport, b.batchNo, b.expiryDate, v.manufacturer, v.vaccineName, va.appointmentDate
    FROM vaccination AS va
    JOIN patient AS p ON va.username = p.username
    JOIN user AS u ON p.username = u.username
    JOIN batch AS b ON b.batchNo = va.batchNo
    JOIN vaccine AS v ON v.vaccineID = b.vaccineID
    WHERE vaccinationID = '$vaccinationID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
?>
<!-- A section to show vaccination information in a card form -->
<div class="container my-5 px-5 py-5 appointment-info" style="width:80%">
  <div class="row d-flex justify-content-center">
    <h1 id="vax-id">Vaccination <?php echo $vaccinationID; ?></h1>
  </div>
  <div class="row">
    <div class="col-sm-6 order-sm-12 d-flex justify-content-center align-items-center">
      <i class="fas fa-user"></i>
    </div>
    <div class="col-sm-6 order-sm-1 ">
      <ul>
        <li class="font-weight-bold">Full Name</li>
        <li><?php echo $row['fullName']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">IC/Passport</li>
        <li><?php echo $row['ICPassport']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">Vaccine Batch Number</li>
        <li><?php echo $row['batchNo']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">Batch Expiry Date</li>
        <li><?php echo $row['expiryDate']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">Vaccine Manufacturer</li>
        <li><?php echo $row['manufacturer']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">Vaccine Name</li>
        <li><?php echo $row['vaccineName']; ?></li>
      </ul>
      <ul>
        <li class="font-weight-bold">Vaccination Date</li>
        <li><?php echo $row['appointmentDate']; ?></li>
      </ul>
    </div>

  </div>

  <!-- A button to trigger the add remarks modal -->
  <div class="row text-center my-3">
    <div class="col">
      <button type="button" class="btn btn-info confirm-btn" data-toggle="modal" data-target="#confirmButton" style="width: 200px;">Confirm</button>
    </div>

  </div>

  <!-- Modal for entering remarks when submit button is clicked -->
  <form action="administer.php" method="POST" name="remarksForm">
    <div class="modal fade" id="confirmButton" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rejectButtonLabel">Add Remarks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="remarks">Remarks</label>
              <textarea class="form-control" placeholder="Remark is optional." id="remarks" name="remarks" rows="5"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn close-btn" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-info">Save</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/zhaoyao.js"></script>