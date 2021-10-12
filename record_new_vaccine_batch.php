<!--Header and dbconnect-->
<?php
session_start();
include 'dbconnect.php';
include 'header.php';
?>
<title>Record New Vaccine Batch</title>
<link rel="stylesheet" href="css/zhaoyao.css">

    <div class="container batch-form mb-5" style="width:80%;">
        <h1 class="text-center mb-5">Record New Vaccine Batch</h1>
        <form action="addBatch.php" method="POST" name="batchForm" onsubmit="return(validateBatch());">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputVacID">VaccineID</label>
                    <select id="inputVacID" class="form-control" onchange="changeVaccine()" name="vacID" required>
                        <option value="">Select a Vaccine</option>
                        <option value="V00001">V00001</option>
                        <option value="V00002">V00002</option>
                        <option value="V00003">V00003</option>
                        <option value="V00004">V00004</option>
                    </select>
                    <div id="vacInfo">
                      <small id='vacMaker' class='form-text text-muted'>Please select a vaccineID.</small>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="datepicker">Expiry Date</label>
                    <input data-date-format="dd/mm/yyyy" id="datepicker" class="form-control" name="expDate" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputBatchNo">Batch Number</label>
                    <input type="text" class="form-control" id="inputBatchNo" placeholder="e.g. B00001" name="batchNo" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNumDoses">Quantity of Doses</label>
                    <input type="number" class="form-control" id="inputNumDoses" placeholder="e.g. 100" name="numDoses" required>
                </div>
            </div>

            <div class="form-row" id="button-row">
                <button type="submit" class="btn button-pcvs btn-info" name="submit">Submit</button>
                <a href="administrator_dashboard.php" type="button" class="btn button-pcvs btn-secondary">Cancel</a>
            </div>

        </form>

    </div>
    <!--Footer-->
    <?php include 'footer.php'; ?>
    <script src="js/zhaoyao.js"></script>