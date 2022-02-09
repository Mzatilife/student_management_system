<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';

$upload = new ResultContr;

if (isset($_POST['upload'])){
$userID = $_POST['userID'];
$type = $_POST['examtype'];
$csv = $_FILES['csv']['tmp_name'];  
$msg = $upload -> uploadResults($userID, $type, $csv);
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

    <title>Lecturer | Courses</title>

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
                <section class="no-padding-top no-padding-bottom d-flex align-items-center justify-content-center">
                <div class="col-lg-8 text-center text-md-center card border-light shadow-sm components-section">
                <div class="block">
                                <h1 class="mb-0 h3 mt-4">Add Results</h1>
                                <?php
                                    if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-success text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                ?> 
                            
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="mt-4" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label class=" form-control-label">Exam Type</label>
                                      <select name="examtype" class="form-control">
                                            <option value="mid">Mid Semester</option>
                                            <option value="end">End of Sem</option>
                                      </select>
                                  </div>
                                  <input type="hidden" name="userID" value="<?php echo $user_id; ?>">
                                <div class="form-group">
                                    <!-- Form -->
                                        <label for="password" class=" form-control-label">Upload (exam) CSV file</label>
                                                <div class="form-file mb-3">
                                                    <input type="file" accept=".csv" name="csv" class="form-control" id="customFile" required>
                                                </div>
                                                <!-- End of Form -->  
                                </div>
                                <div class="form-group"> 
                                <button type="submit" name="upload" class="btn btn-info">Upload Results</button>      
                                </div>
                            </form>
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