<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lecturer|Dashboard</title>

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

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Personnal</div>
                                                <?php 
                                                $users =  new ManageUserView();
                                                $user = $users->userById($user_id);
                                                $course = new ManageCoursesView();
                                                $row = $course->lecturerCourses($user_id);
                                                $count = count($row);
                                                ?>
                                            <div class="h6 mb-0 font-weight-bold text-gray-700">ID: <?php echo $username;?> | Program: <?php echo $program;?> | Email: <?php echo $user['email'];?></div>
                                        </div>
                                        <div class="col-auto">
                                        <b class="text-primary font-weight-bold">Courses: <?php echo $count;?> <i class="fas fa-book text-gray-500"></i></b>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php
                                    foreach($row as $rw){ ?>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-light pb-3">
                                    <div>
                                    <h6 class="mb-0"><span class="icon icon-xs mr-1"><span class="fas fa-book"></span></span><?php echo $rw['course_name'];?></h6>
                                    </div>
                                    <div>
                                    <b class="text-primary font-weight-bold"><?php echo $rw['course_code'];?> <span class="fas fa-calendar ml-2"></span> <?php echo $rw['semester'];?></b>
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
                                                    <span class="h6 font-weight-bold">Lecturer Dashboard</span>
                                                </div>
                                                <p class="lead" style="text-align: justify;">Welcome <b><?php echo $username; ?></b>, <br>You can view all the courses assigned to you here.
                                                You will be capable of uploading examination results. You can upload mid semester results as well as end of semester results. <br><br> <b>Management</b></p>
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