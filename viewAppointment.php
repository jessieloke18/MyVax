<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>My Appointments</title>
<link rel="stylesheet" href="css/jessie.css">
<!--Banner-->
<div class="container-fluid d-flex justify-content-center align-items-center my-appointments-banner">
    <h1 class="banner-title">My Appointments</h1>
</div>
<!--Vaccine table-->
<div class="container available-vac-container">
    <h3 class="mt-5 first-dose">First Dose</h3>
    <table class="table table-striped mb-5 table-responsive-md">
        <thead>
            <tr>
                <th scope="col">Vaccination ID</th>
                <th scope="col">Vaccination Date</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Centre Name</th>
                <th scope="col">Batch Number</th>
                <th scope="col">Status</th>
                <th scope="col">Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT vaccinationID, appointmentDate, vaccineName, hc.centreName, b.batchNo, status, remarks
            FROM healthcarecentre AS hc
            JOIN batch AS b ON hc.centreName = b.centreName
            JOIN vaccine AS v ON v.vaccineID = b.vaccineID
            JOIN vaccination AS va ON va.batchNo = b.batchNo
            WHERE username = '$username'";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo 'VAX'.$row['vaccinationID'] ?></th>
                    <td><?php echo date("d/m/Y", strtotime($row["appointmentDate"]))?></td>
                    <td><?php echo $row['vaccineName'] ?></td>
                    <td><?php echo $row['centreName'] ?></td>
                    <td><?php echo $row['batchNo'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['remarks'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/scripts.js"></script>