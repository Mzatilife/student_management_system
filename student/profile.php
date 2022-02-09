<?php
include '../includes/session.inc.php';
include '../includes/classautoloader.inc.php';

if (isset($_POST['submit'])) {
    $oldPass = $_POST['oldpass'];
    $newPass = $_POST['newpass'];
    $confPass = $_POST['confpass'];

    $change = new ManageUserContr();
    $msg = $change->changePassword($oldPass, $newPass, $confPass, $user_id);
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

    <title>Student|Profile</title>

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

                <div class="row">
                            <div class="col-12 col-xl-8">
                                <div class="card card-body bg-white border-light shadow-sm mb-4">
                                    <h2 class="h5 mb-4">General information</h2>
                                        <div class="row">
                                              <!-- Form -->
                                              <div class="mb-3 col-md-6">
                                                <label class="my-1 mr-2" for="country">On campus/ off campus</label>
                                                    <select class="form-control" id="country" name="campus" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="oncampus">On Campus</option>
                                                        <option value="offcampus">Off campus</option>
                                                    </select>
                                                </div>
                                                <!-- End of Form -->
                                        </div>
                                        
                                        <div>
                                            <button type="submit" class="btn btn-primary">Change</button>
                                        </div>
                                        <h2 class="h5 my-4">Change Password</h2>
                                 <?php
                                    if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-primary text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                   ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="mt-4">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                    <label for="address">Old Password</label>
                                                    <input class="form-control" id="address" type="password" name="oldpass" placeholder="Enter old password" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                    <label for="address">New Password</label>
                                                    <input class="form-control" id="address" type="password"  name="newpass" placeholder="Enter new password" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                    <label for="number">Confirm Password</label>
                                                    <input class="form-control" id="number" type="password"  name="confpass" placeholder="confirm new password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                        <input type="submit" value="continue" name="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card border-light text-center p-0">
                                            <div class="profile-cover rounded-top" data-background="../assets/images/hero.jpeg"></div>
                                            <div class="card-body pb-5">
                                                <img src="../assets/images/logo.svg" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="image">
                                                <?php 
                                                $stud = new RegistrationView();
                                                $stu = $stud->vieStudent($user_id);
                                                ?>
                                                <h4 class="h3"><?php echo $stu['first_name']." ".$stu['last_name'];?></h4>
                                                <h5 class="font-weight-normal"><?php echo $stu['reg_number'];?></h5>
                                                <p class="text-gray mb-4"><?php echo $stu['district'].", ".$stu['nationality'];?></p>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-body bg-white border-light shadow-sm mb-4">
                                            <h2 class="h5 mb-4">Other Information</h2>
                                            <div class="d-xl-flex align-items-center">
                                                <div class="file-field">
                                                       <p class="text-gray mb-4">Campus: <b><?php echo $stu['campus'];?></b>, Marital Status: <b><?php echo $stu['marital'];?></b>.</p>
                                                       <address>
                                                       <?php echo $stu['mailing_address'];?>
                                                       </address>
                                                 </div>                                        
                                            </div>
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