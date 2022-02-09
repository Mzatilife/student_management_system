<?php
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';
if (isset($_GET['stdID'])) {
    $stdID = $_GET['stdID'];
    $_SESSION['stdID'] = $stdID;

    header("location: standardize.php");
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

    <title>HOD | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
      <!--====== Favicon Icon ======-->
      <link rel="shortcut icon" href="../assets/images/logo.svg" type="image/svg">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include 'sidebar.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">        
                                <!-- Card Body -->
                                <div class="card-body">
                                
                            <div class="col-md-12">
                            <div class="mt-5 mb-3 mt-sm-0">
                            <span class="h6 font-weight-bold">Head of Department Dashboard</span>
                            </div>
                            <p class="lead" style="text-align: justify;">Welcome <b><?php echo $username; ?></b>, <br>You can upload, view, edit and delete courses.
                            You can also view examination details and standardize if authorised by the senate. You can view all <?php echo $program; ?> students and lecturers. <br><br> <b>Management</b></p>
                            </div>

                            <div class="card mb-4 border-bottom-secondary">
                                <div class="card-body">
                                <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Lecturers
                                            <div class="text-white-50 small">
                                            <?php
                                            $object = new ManageUserView();
                                            echo $object->countUsers('lecturer', $program);
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Students
                                            <div class="text-white-50 small">
                                            <?php 
                                            echo $object->countStudents($program);
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Standardize</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php 
                                    $std = new StandardizeView();
                                    $new = $std->viewRequest($program);

                                    foreach($new as $row){ ?>
                                    <div class="d-flex align-items-center justify-content-between border-bottom border-light pb-3">
                                    <div>
                                    <h6 class="mb-0"><span class="icon icon-xs mr-1"><span class="fas fa-book"></span></span><?php echo $row['course_name'];?></h6>
                                    </div>
                                    <div>
                                    <b class="text-primary font-weight-bold"><span class="fas fa-calendar mr-4">  <?php echo $row['semester'];?></span><a href="dashboard.php?stdID=<?php echo $row['request_id'];?>" class="btn btn-primary btn-sm btn-square"><span class="fas fa-weight"></span></a></b>
                                    </div>
                                    </div>
                                    <?php } ?>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>