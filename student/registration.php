<?php
include '../includes/session.inc.php';
include '../includes/classautoloader.inc.php';

if (isset($_GET['enroll'])) {
$sem = $_GET['enroll'];

$passrate = new ResultView();
$rate = $passrate->viewGrading($program);
$passRate = $rate['pass'];

$enroll = new RegistrationContr;
$msg = $enroll->enrollToNextSem($username, $sem, $passRate);
}

if (isset($_POST['submit'])) {    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $semester = $_POST['sem'];
    $campus = $_POST['campus'];
    $nationalid = $_POST['nationalID'];
    $nationality = $_POST['national'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $mailingad = $_POST['mailingad'];
    $village = $_POST['village'];
    $ta = $_POST['TA'];
    $district = $_POST['district'];
    $marital = $_POST['marital'];
    $sname = (isset($_POST['sname']) ? $_POST['sname'] : null);
    $saddress = (isset($_POST['saddress']) ? $_POST['saddress'] : null);
    $sphone = (isset($_POST['sphone']) ? $_POST['sphone'] : null);
    $semail = (isset($_POST['semail']) ? $_POST['semail'] : null);
    $sdistrict = (isset($_POST['sdistrict']) ? $_POST['sdistrict'] : null);
    $sta = (isset($_POST['sta']) ? $_POST['sta'] : null);
    $gname = $_POST['gname'];
    $goccupation = $_POST['goccupation'];
    $gemail = $_POST['gemail'];
    $gmobile = $_POST['gmobile'];
    $gmailing = $_POST['gmailing'];
    $hq = $_POST['hq'];
    $year = $_POST['year'];
    
    $obj = new RegistrationContr;
    $msg = $obj->getDetails($user_id, $fname, $lname, $username, $semester, $campus, $nationalid, $nationality, $gender, $DOB, $mailingad, $village, $ta, $district, $marital, $sname, $saddress, $sphone, $semail, $sdistrict, $sta, $gname, $goccupation, $gemail, $gmobile, $gmailing, $hq, $year);
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

    <title>Student | Registration</title>

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

      <?php include 'sidebar.php'; 
      
                                    $course = new RegistrationView();
                                    $row = $course->viewSemester($username);
                                    $sem = $row['semester'];
                                    ?>

        
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                                if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-info text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                ?>
                
                    <?php 
                    $count = new RegistrationView;
                    if($count->registrationResult($username)){
                    include '../includes/enroll.inc.php';
                    }else{
                    include '../includes/regform.inc.php';
                     } ?>
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