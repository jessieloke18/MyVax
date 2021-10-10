<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/zhaoyao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <title>Record New Vaccine Batch</title>
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="../images/logowhite1.png" alt="MyVax Logo" width="110" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                  Eddie Zhao Yao
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

    <div class="container batch-form" style="width:80%;">
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
                    <label for="inputNumDoses">Quality of Doses</label>
                    <input type="number" class="form-control" id="inputNumDoses" placeholder="e.g. 100" name="numDoses" required>
                </div>
            </div>

            <div class="form-row" id="button-row">
                <button type="submit" class="btn button-pcvs btn-info" name="submit">Submit</button>
                <a href="administrator_dashboard.php" type="button" class="btn button-pcvs btn-light">Cancel</a>
            </div>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <!-- Datepicker-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/zhaoyao.js"></script>

</body>

</html>