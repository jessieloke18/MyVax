<?php
    include 'dbconnet.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/zhaoyao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/2310cb5c3b.js" crossorigin="anonymous"></script>
    <title>Administrator Dashboard</title>
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="images/logowhite1.png" alt="MyVax Logo" width="110"
                    height="50">
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

    <div class="container" id="admin-alert">
        <div class="alert alert-info" role="alert">
            Hi Administrator Eddie. You're now managing: HELP Healthcare Centre.
        </div>
    </div>

    <div class="container d-flex align-items-center" id="admin-functions" onmouseover="boldCardText()">
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3">
                <a href="record_new_vaccine_batch.php" class="card-links">
                    <div class="card function-card h-100">
                        <img src="images/function4.jpg" class="card-img-top" alt="Record Vaccine Batch">
                        <div class="card-body">
                            <p class="card-text">
                                Record Vaccine Batch
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <a href="view_vaccine_batch_info.html" class="card-links">
                    <div class="card function-card h-100">
                        <img src="images/function3.jpg" class="card-img-top" alt="View Batch Info">
                        <div class="card-body">
                            <p class="card-text">
                                View Batch Info
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <a href="#" class="card-links">
                    <div class="card function-card h-100">
                        <img src="images/editprofile.jpg" class="card-img-top" alt="Edit Profile">
                        <div class="card-body">
                            <p class="card-text">
                                Edit Profile
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <a href="index.html" class="card-links">
                    <div class="card function-card h-100">
                        <img src="images/logout.jpg" class="card-img-top" alt="Logout">
                        <div class="card-body">
                            <p class="card-text">
                                Logout
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container mb-3" style="width:80%">
        <h5>Overview</h5>
    </div>

    <div class="container" style="width:80%">
        <div class="row">
            <div class="col-md-3">
                <div class="card overview-card bg-success">
                    <div class="card-body d-flex flex-column">
                        <div class="ml-auto">
                            <i class="fas fa-syringe fa-2x"></i>
                        </div>
                        <div class="mt-auto">
                            <p class="card-text" id="overview-text">Vaccinations <span
                                    class="badge badge-light badge-pill">110</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card overview-card bg-warning">
                    <div class="card-body d-flex flex-column">
                        <div class="ml-auto">
                            <i class="far fa-list-alt fa-2x"></i>
                        </div>
                        <div class="mt-auto">
                            <p class="card-text" id="overview-text">Pending <span
                                    class="badge badge-light badge-pill">20</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card overview-card bg-danger">
                    <div class="card-body d-flex flex-column">
                        <div class="ml-auto">
                            <i class="far fa-check-circle fa-2x"></i>
                        </div>
                        <div class="mt-auto">
                            <p class="card-text" id="overview-text">Administered <span
                                    class="badge badge-light badge-pill">89</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card overview-card bg-primary">
                    <div class="card-body d-flex flex-column">
                        <div class="ml-auto">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="mt-auto">
                            <p class="card-text" id="overview-text">Users <span
                                    class="badge badge-light badge-pill">31</span></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="js/zhaoyao.js"></script>
</body>

</html>