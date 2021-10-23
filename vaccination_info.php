<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>

<?php
if (isset($_GET['vaccinationID'])) {
    $vaccinationID = mysqli_real_escape_string($conn, $_GET['vaccinationID']);
    $sql = "SELECT u.fullName, p.ICPassport, b.batchNo, v.vaccineName, va.status 
    FROM vaccination AS va 
    JOIN patient AS p ON va.username = p.username
    JOIN user AS u ON u.username = p.username
    JOIN batch AS b ON va.batchNo = b.batchNo
    JOIN vaccine AS v ON v.vaccineID = b.vaccineID
    WHERE vaccinationID = '$vaccinationID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<title>Vaccination <?php echo $vaccinationID; ?></title>
<link rel="stylesheet" href="css/zhaoyao.css">
<script src="https://kit.fontawesome.com/2310cb5c3b.js" crossorigin="anonymous"></script>

<h2 class="mt-5 font-weight-bold">Vaccination <?php echo $vaccinationID; ?></h2>

<div class="container border info-section mt-5">
    <div class="row">
        <div class="col-md-6">
            <p class="font-weight-bold">Patient Name:</p>
            <p id="pname"><?php echo $row['fullName']; ?></p>
        </div>
        <div class="col-md-6">
            <p class="font-weight-bold">Patient IC/Passport:</p>
            <p id="vicpass"><?php echo $row['ICPassport']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="font-weight-bold">Batch Number:</p>
            <p id="vbatchno"><?php echo $row['batchNo']; ?></p>
        </div>
        <div class="col-md-6">
            <p class="font-weight-bold">Vaccine Name:</p>
            <p id="vname"><?php echo $row['vaccineName']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="font-weight-bold">Status:</p>
            <p id="vstatus"><?php echo $row['status']; ?></p>
        </div>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <?php
        if ($row['status'] == "pending") {
            echo '<a href="confirmAppointment.php?vaccinationID=' . $vaccinationID . '"><button class="btn button-pcvs btn-info">Confirm Appointment</button></a>';
        } else if ($row['status'] == "confirmed") {
            echo '<a href="record_vaccination_administered.php?vaccinationID=' . $vaccinationID . '"><button class="btn button-pcvs btn-info">Log As Administered</button></a>';
        }
        ?>
        <a href="javascript:history.back()"><button class="btn button-pcvs btn-secondary"><i class="fas fa-chevron-left"></i>Other Vaccinations</button></a>
    </div>
</div>

<!--Footer-->
<?php include 'footer.php'; ?>
<script src="js/zhaoyao.js"></script>