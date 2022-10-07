<?php

require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal | My Profile</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- bootstrap5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .address {
            text-transform: capitalize;
        }

        /* 
    .card{
     
      background-color: #e9e7e5;

    } */
        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: gray;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src {
            width: 100%;

        }

        /*Profile Pic End*/
    </style>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 2;
        require_once("includes/sidebar.php");

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once("includes/header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-900">My Profile</h1>
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#profile" class="nav-link active"><i class="fas fa-user"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#subreq" class="nav-link"><i class="fas fa-file"></i> Requirements</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <?php
                                                    //check if picture is existing in uploads/users   
                                                    $file = 'uploads/users/' . $sid . '.jpg';
                                                    if (!file_exists($file)) {
                                                        $dp = 'default.jpg';
                                                    } else {
                                                        $dp = $sid . '.jpg';
                                                    }
                                                    echo '<img  src="uploads/users/' . $dp . '" alt="Admin" class="rounded-circle" width="120">';
                                                    ?>
                                                    <div class="mt-3">
                                                        <h4 class="text-gray-900 font-weight-bold"><?= $fullname ?></h4>
                                                        <p class="text-secondary mb-1 text-gray-900"><?= $snum ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $yrlevel ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $course ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $fullname ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Birthday</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $bday 
                                                        ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3 ">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $email ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $mobile ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $address ?>, <?= $region ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Guardian</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardian ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardiancontact ?></span>
                                                    </div>
                                                </div>


                                                <!-- <div class="col-sm-12">
                                                    <a class="btn btn-primary " target="__blank" href="#">Edit</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="subreq">
                                <?php include_once("includes/req.php")
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>

    </div>
    <!-- End of Page Wrapper -->


    <?php
    include("includes/scripts.php");
    ?>

</body>
<script src="js/header.js"></script>
</html>