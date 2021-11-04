<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>View Vaccine Batch Info</title>
<link rel="stylesheet" href="css/zhaoyao.css">

<h2 class="mt-5 font-weight-bold">Available Vaccine Batches</h2>

<div class="container mt-5" style="width:80%; padding: 0px 20px;">
  <div class="row">
    <div class="col">Action Column: <i class="fas fa-eye ml-3" style="margin-right:0px;"></i> View Details</div>
  </div>
</div>
<!-- Table to show the batches in the current healthcare centre -->
<div class="container table-section">
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th scope="col">BatchNo</th>
        <th scope="col">Vaccine Name</th>
        <th scope="col">Pending</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $username = $_SESSION['username'];
      $centreName = $_SESSION['centreName'];
      $statement1 = "SELECT t1.batchNo, t2.vaccineName, t1.quantityPending FROM batch AS t1 INNER JOIN vaccine AS t2 ON t1.vaccineID = t2.vaccineID WHERE centreName='$centreName'";
      $result = mysqli_query($conn, $statement1);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr><th scope="row">' . $row['batchNo'] . "</th><td>" . $row['vaccineName'] . "</td><td>" . $row['quantityPending'] . "</td>"
            . '<td><a href="view_vaccination_info.php?batchNo=' . $row['batchNo'] . '"><i class="fas fa-eye" style="color: #17A2B8;"></i></a></td></tr>';
        }
      } else {
        echo '<tr><td colspan="4">There is no batch in this healthcare centre yet.</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<div class="container d-flex justify-content-center mb-5 mt-5">
  <a href="administrator_dashboard.php"><button class="btn button-pcvs btn-info"><i class="fas fa-chevron-left"></i>Back To Dashboard</button></a>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="../js/zhaoyao.js"></script>