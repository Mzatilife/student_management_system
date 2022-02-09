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

    <title>DOS|Profile</title>

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
                <?php
                                if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-primary text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                ?>
                            <div class="col-12 col-xl-12">
                                <div class="card card-body bg-white border-light shadow-sm mb-4">
                                    <div class="col-12 mb-4">
                                        <div class="card border-light text-center p-0">
                                            <div class="profile-cover rounded-top" data-background="../assets/images/hero.jpeg"></div>
                                            <div class="card-body pb-5">
                                                <img src="../assets/images/logo.svg" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                                                <?php 
                                                $users =  new ManageUserView();
                                                $user = $users->userById($user_id);
                                                ?>
                                                <h4 class="h3"><?php echo $user['username']; ?></h4>
                                                <h5 class="font-weight-normal"><?php echo $user['user_type']; ?></h5>
                                                <p class="text-gray mb-4"><?php echo $user['email']; ?></p>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-form">Change Password</button>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 <!-- Modal Content -->
 <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card border-light p-4">
                                                                    <div class="card-body">
                                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="mt-4">
                                                                            <!-- Form -->
                                                                            <div class="form-group mb-4">
                                                                                <label for="exampleInputEmailCard1">Old Password</label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-lock"></span></span>
                                                                                    <input type="password" name="oldpass" class="form-control" placeholder="Enter old password" id="exampleInputEmailCard1">
                                                                                </div>  
                                                                            </div>
                                                                            <!-- End of Form -->
                                                                            <div class="form-group">
                                                                                <!-- Form -->
                                                                                <div class="form-group mb-4">
                                                                                    <label for="exampleInputPasswordCard1">New Password</label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-lock"></span></span>
                                                                                        <input type="password" name="newpass" placeholder="Enter new password" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                                <!-- Form -->
                                                                                <div class="form-group mb-4">
                                                                                    <label for="exampleInputPasswordCard1">Confirm Password</label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-lock"></span></span>
                                                                                        <input type="password" name="confpass" placeholder="confirm new password" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                                
                                                                            </div>
                                                                            <input type="submit" value="continue" name="submit" class="btn btn-block btn-primary">
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of Modal Content -->
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