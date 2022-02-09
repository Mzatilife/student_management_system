<?php
declare(strict_types = 1);
$msg = "";
include '../includes/register.inc.php';
include '../includes/session.inc.php';

$upload =  new ProgramContr();
if (isset($_POST['add'])){
    $msg = $upload -> addFaculty($_POST['fname']);  
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

    <title>Registrar | Add Faculty</title>

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
                    <section class="no-padding-top no-padding-bottom d-flex align-items-center justify-content-center">
                            <div class="card shadow mb-4 col-lg-6">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="col-lg-12 text-center text-md-center card border-light components-section">
                            <div class="block">
                            <?php
                                    if (empty($msg2)) {}
                                    else{
                                    echo "<div class='alert alert-danger text-center'>
                                    <strong>".$msg2."</strong>
                                    </div>";
                                    }

                                    if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-success text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                  <div class="form-group">       
                                    <label class="form-control-label">Faculty Name</label>
                                    <input type="text" name="fname" placeholder="Faculty name" class="form-control" required>
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Add Faculty" name="add" class="btn btn-info">
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

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>