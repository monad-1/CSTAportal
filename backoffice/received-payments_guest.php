<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once('includes/fetchuserdetails.php');

//get office from fetchuserdetails.php
$office = $Office;

if (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])) {
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

    <title>For Verification | Guest</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

    <!--Jquery Datatables Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Export -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        //office conditions for sidebar menu
        if ($office == "Accounting") {
            $pageValue = 4;
        } else {
            header("Location:index.php");
        }

        require_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                <?php require_once('includes/header.php'); ?>
                <!-- End of Header -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Pending Payments Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-money-bill fa-fw"></i> For Verification Guest
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th>Name</th>
                                            <th>Attachment/s</th>
                                            <th>Amount</th>
                                            <th>Sent Via</th>
                                            <th>Date Paid</th>
                                            <th>Time Paid</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM guest_payverif WHERE payment_status=? order by date_acknowledged";
                                        $data = array('Received');
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute($data);
                                        $result = $stmt->fetchAll();

                                        foreach ($result as $row) {

                                            $payment = "../student/uploads/payverif/guest/assessment/{$row['gp_id']}.jpg";
                                            $assessment = "../student/uploads/payverif/guest/pof/{$row['gp_id']}.jpg";

                                            if (file_exists($assessment)) {

                                                $img = '
                                                    <a href="../student/uploads/payverif/guest/assessment/' . $row['gp_id'] . '.jpg"   title="Assessment" class="btn btn-warning" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img = "";
                                            }

                                            if (file_exists($payment)) {
                                                $img2 = '<a href="../student/uploads/payverif/guest/pof/' . $row['gp_id'] . '.jpg" title="Proof of Payment" class="btn btn-info" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img2 = "";
                                            }

                                            $reqform = "";
                                            echo '<tr> 
                             


                                                        <td>' . $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] . '</td>
                                                        


                                                        <td>
                                                        ' . $img . '
                                                        ' . $img2 . '
                                                        </td>
                                                       
                                                        <td  style="text-align:right;">' . $row['amtpaid'] . '</td>
                                                        <td>' . $row['sentvia_ID'] . '</td>
                                                        <td>' . $row['date_of_payment'] . ' </td>
                                                        <td>' . $row['time_of_payment'] . ' </td>
                                                        

                                                        <td> 
                                                        <button class="btn btn-success" onclick="loadRecord(' . $row['gp_id'] . ')" title="Verify"><i class="fa fa-check fa-fw"></i></button>
                                                        </td>
                                                      </tr>';
                                        }
                                        ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="verifypayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="fa fa-check"></i><strong> Verify Payment</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="codes/verify-payments.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">

                            <input type="hidden" name="pv_ID" id="pv_ID" class="form-control">
                            <input type="hidden" name="sid" id="txtsid" class="form-control">
                            <input type="hidden" name="name" id="txtemail" class="form-control" disabled>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Verification Code:</label>
                                    <input type="text" name="verif_code" id="verif_code" class="form-control" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="verifypayment"><i class="fas fa-hand"></i> Send</button>
                            </div>
                </form>
            </div>
        </div>
    </div>



    <!-- scripts -->
    <script src="js/verify-payments_guest.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <?php

if (
    
(isset($_SESSION['status']) && $_SESSION['status'] != '') 

||


(isset($_SESSION['msg']) && $_SESSION['msg'] != '') 

||  


(isset($_SESSION['status_code']) && $_SESSION['status_code'] != '')  

) {

?>

<!-- success swal -->
<script>
  swal({
      title: "<?php echo $_SESSION['status']; ?>",
      text: "<?php echo $_SESSION['msg']; ?>",
      icon: "<?php echo $_SESSION['status_code']; ?>",
      button: false,
      timer: 4000
  });
</script>

<?php
}
unset($_SESSION['status']);
 unset($_SESSION['msg']);
  unset($_SESSION['status_code']);
?>


















</body>

</html>
