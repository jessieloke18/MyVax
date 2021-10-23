<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>View Vaccination Info</title>
<link rel="stylesheet" href="css/zhaoyao.css">
<script src="https://kit.fontawesome.com/2310cb5c3b.js" crossorigin="anonymous"></script>

<?php
if (isset($_GET['batchNo'])) {
  $batchNo = mysqli_real_escape_string($conn, $_GET['batchNo']);
  $sql = "SELECT * FROM batch where batchNo = '$batchNo'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION["batchNo"] = $batchNo;
  function convertDate($date){
    $timestamp = strtotime($date);
    $new_timestamp = date("d-m-Y", $timestamp);
    $new_date = str_replace('-', '/', $new_timestamp);
    echo $new_date;
  }
}
?>

<h2 class="mt-5 font-weight-bold">Batch <?php echo $batchNo; ?></h2>

<!-- A section to show information about current batch -->
<div class="container border info-section mt-5">
  <div class="row">
    <div class="col-md-6">
      <p class="font-weight-bold">No. Of Pending Vaccination:</p>
      <p id="pending"><?php echo $row['quantityPending']; ?></p>
    </div>
    <div class="col-md-6">
      <p class="font-weight-bold">Batch Expiry Date:</p>
      <p id="batchExDate"><?php convertDate($row['expiryDate']) ?></p>
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
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql2 = "SELECT vaccinationID, appointmentDate, status FROM vaccination WHERE batchNo = '$batchNo'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      if (mysqli_num_rows($result2) == 0) {
        echo '<tr><td colspan="4">There is no vaccination in this batch yet.</td></tr>';
      } else {
        do {
      ?>
          <tr>
            <th scope="row"><?php echo $row2["vaccinationID"]; ?></th>
            <td><?php convertDate($row2['appointmentDate']) ?></td>
            <td><?php echo $row2["status"]; ?></td>
            <td>
              <a href="vaccination_info.php?vaccinationID=<?php echo $row2["vaccinationID"]; ?>"><i class="far fa-eye"></i></a>
            </td>
          </tr>
      <?php } while ($row2 = mysqli_fetch_assoc($result2));
      }
      ?>
    </tbody>
  </table>
</div>

<!-- A button to go back to dashboard -->
<div class="container d-flex justify-content-center mb-5">
  <a href="view_vaccine_batch_info.php"><button class="btn button-pcvs btn-info"><i class="fas fa-chevron-left"></i>Other Batches</button></a>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/zhaoyao.js"></script>