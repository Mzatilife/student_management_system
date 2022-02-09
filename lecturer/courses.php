<?php

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

    <title>Lecturer|Courses</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                                    echo "<div class='alert alert-success text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                ?> 
                 <!-- DataTales Example -->
                 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-bottom" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $course = new ManageCoursesView();
                                    $row = $course->lecturerCourses($user_id);
                                    foreach($row as $rw){
                                    echo "<tr>
                                    <td>" .$rw['course_code']."</td>
                                    <td>" .$rw['course_name']."</td>
                                    <td style='width:20%;'>
                                    <a href='#modal-form' data-toggle='modal' class='btn btn-info btn-sm mr-0'>
                                    <i class='fas fa-upload'></i> Upload Results</a>
                                    </td>
                                    </tr>";
                                     }

                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
  <!-- Modal Content -->
  <div
        class="modal fade"
        id="modal-form"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
    <div class="modal-header">
    <p class="modal-title" id="modal-title-notification">Add Results</p>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
                <div class="modal-body p-0">
                <div class="col-lg-12 text-center text-md-center card border-light shadow-sm components-section">
                <div class="block">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->

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