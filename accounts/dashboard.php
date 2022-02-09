<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DOS|Dashboard</title>

        <!-- Custom fonts for this template-->
        <link
            href="../assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">
        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link
            href="../assets/vendor/datatables/dataTables.bootstrap4.min.css"
            rel="stylesheet">
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="../assets/images/logo.svg" type="image/svg">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include 'sidebar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <img style="height: 400px;"
                                    class="img-fluid mb-3  w-100"
                                    src="../assets/images/accounts.jpeg"
                                    alt="404 not found">
                                <div class="row">
                                    <a href="addpayment.php" class="btn-primary btn w-50">Add Details</a>
                                    <a href="payment_details.php" class="btn-secondary btn ml-auto w-50">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="mt-5 mb-3 mt-sm-0">
                                        <span class="h6 font-weight-bold">Accounts Dashboard</span>
                                    </div>
                                    <p class="lead" style="text-align: justify;">Welcome,
                                        <br><br>
                                        This panel provides the accounts the ability to view and upload student payment
                                        details. The accounts personnel can also edit the details and make a report from the payment details. 
                                        The operations are enlisted on the sidebar.<br><br>
                                        <b>Management</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Student Management System 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>