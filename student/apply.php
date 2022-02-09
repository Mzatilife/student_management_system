<?php
declare(strict_types = 1);

include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
$upload = new HostelContr; 

if (isset($_POST['upload'])){
    $gender = $_POST['gender'];
    $hostID = $_POST['hosID'];
    $room = $_POST['room'];
    $result = $upload -> applyHostel($user_id, $username, $hostID, $room, $gender);
    if ($result) {
      $msg = "Application sent!";
     }else{
         $msg2 = "You already Applied";
     }
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

    <title>student|apply for hostels</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-select.css" rel="stylesheet" type="text/css">
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
                    <section class="no-padding-top no-padding-bottom d-flex align-items-center justify-content-center">
                    <div class="card shadow mb-4 col-lg-6">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Apply for a hostel of your choice!</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                        <div class="col-lg-12 text-center text-md-center card border-light components-section">
                            <div class="block">
                                <?php
                                if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-success text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                    if (empty($msg2)) {}
                                    else{
                                    echo "<div class='alert alert-danger text-center'>
                                    <strong>".$msg2."</strong>
                                    </div>";
                                    }
                                    ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="form-group">
                                    <label class=" form-control-label font-weight-bold">Hostel Name</label>
                                      <select name="hosID" class="form-control selectpicker" data-live-search="true">
                                      <?php
                                        $course = new RegistrationView();
                                        $row = $course->viewSemester($username);
                                        $gender = $row['gender'];

                                        $hostel = new HostelView();
                                        $row2 = $hostel->hostelViews($gender);
                                        foreach($row2 as $result){
                                        echo "<option value='".$result['hostel_id']."'>".$result['hostel_name']."</option>";
                                        }
                                        ?>
                                      </select>
                                  </div>
                                  <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control" hidden>
                                  <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Room Number</label>
                                    <input type="number" name="room" placeholder="Room number" class="form-control" required>
                                  </div>
                                  
                                  <div class="form-group">       
                                    <input type="submit" value="Apply" name="upload" class="btn btn-info">
                                  </div>
                                </form>
                              </div>
                            </div>
                            
                            </div>
                    </div>
                
                    </section>
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
    <script src="../assets/js/bootstrap-select.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>