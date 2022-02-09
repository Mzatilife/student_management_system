<?php
include '../includes/session.inc.php';
include '../includes/classautoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student|Dashboard</title>

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
                                   <?php
                                    $course = new RegistrationView();
                                    $row = $course->viewSemester($username);
                                    $sem = $row['semester'];
                                    ?>
                       <!-- Personnal details Card  -->
                       <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Personnal Details</div>
                                            
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $row['first_name'].' '.$row['last_name']; ?> | <?php echo $username; ?> | Semester <?php echo $sem; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Balance Card -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Other info.</div>
                                            <?php 
                                            $hostel = new HostelView();
                                            $hos = $hostel->viewAllocations($username);

                                             $balance = new AccountView();
                                             $row2 = $balance->balanceView($username, $sem);
                                             $bal = $row2['balance'];
                                            
                                            echo "<div class='h6 font-weight-bold mb-0 text-gray-800'>Balance: K".number_format($bal)."";
                                            if (!empty($hos)) {
                                            echo "<b class='text-info float-right'>| Hostel: ".$hos['hostel_name'].", Room: ".$hos['room_no'].", Bed: ".$hos['bed_no']." | </b></div>";
                                            }else{
                                            echo " <b class='text-warning float-right'> | You were not allocated! |</b> </div>";
                                            }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Semester <?php echo $sem;?> Courses</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php
                                    $course = new ManageCoursesView();
                                    $row3 = $course->coursesView($sem, $sem, $program);
                                    foreach($row3 as $rw){?>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-light pb-3">
                                    <div>
                                    <h6 class="mb-0"><span class="icon icon-xs mr-1"><span class="fas fa-book"></span></span><?php echo $rw['course_name'];?></h6>
                                    </div>
                                    <div>
                                    <b class="text-primary font-weight-bold"><?php echo $rw['course_code'];?> </b>
                                    </div>
                                    </div>
                                    <?php } ?>
                                
                                </div>
                            </div>
                        </div>
                                    <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="col-md-12">
                                                <div class="mt-5 mb-3 mt-sm-0">
                                                    <span class="h6 font-weight-bold">Student Dashboard</span>
                                                </div>
                                                <p class="lead" style="text-align: justify;">Welcome <b><?php echo $username; ?></b>, <br> You can register, view examination results
                                                and access the course road map. When registering, specify if you are "on campus" or "off campus" and you will be able to apply for hostels.
                                                You will be able to access most of the services after paying half or completion of the fees. <br><br> <b>Management</b></p>
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
</body>

</html>