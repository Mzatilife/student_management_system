<?php
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';

if (isset($_POST['submit'])) {
    $distinction = $_POST['distinct'];
	$credit =$_POST['credit'];
    $pass = $_POST['pass'];
	$supp =$_POST['supp'];
    $rep =$_POST['rep'];
    $cid = $_POST['cID'];
	$year =$_POST['year'];
    $semester = $_POST['sem'];
    $update = new ResultContr();
    $msg = $update->standardiseGrades($cid, $semester, $year, $distinction, $credit, $pass, $supp, $rep, $program);
}
if (isset($_POST['cont'])) {
    $cid = $_POST['cID'];
	$year =$_POST['year'];
    $semester = $_POST['sem'];
    $update = new ResultContr();
    $msg = $update->addMarks($cid, $semester, $year, $program);
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

    <title>HOD|standardize</title>

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
                                    echo "<div class='alert alert-primary text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                ?>
                <div class="card mb-4 border-bottom-primary">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php
                                        
                                        $std = new StandardizeView();
                                        $st = $std->viewStandard($_SESSION['stdID']);
                                        $courseId = $st['course_id'];
                                        $sem = $st['semester'];
                                        $year = $st['year'];
                                        
                                        $results = new ResultView();
                                        $st = $results->viewStandard($courseId, $sem, $year);
                    if (!empty($st)) {
                        if ($st['status'] == 0) {
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="mt-4">
                    <b>Distinction: <b class="text-primary"><?php echo $st['distinction']; ?>%</b>, Credit: <b class="text-primary"><?php echo $st['credit']; ?>%</b>, Pass: <b class="text-primary"><?php echo $st['pass']; ?>%</b>,  Supplementary: <b class="text-primary"><?php echo $st['supplementary']; ?>%.</b></b>
                    <input type="hidden" name="cID" value="<?php echo $courseId ?>">
                    <input type="hidden" name="year" value="<?php echo $year ?>">
                    <input type="hidden" name="sem" value="<?php echo $sem ?>">
                    <button type="submit" name="cont" class="btn btn-primary ml-3">Continue</button>
                    </form>
                    <?php }else{
                        echo "<b>The results are standardized!</b>";
                     }
                     }else{ ?>
                    <b>The results are not standardized!</b>
                    <?php }  ?>
                    </div>
                    <div class="col-auto">
                    <a href="#modal-form" class="btn btn-primary btn-icon-split  " data-toggle="modal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="text">Standardize</span>
                    </a>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Exam Grades</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Reg. number</th>
                                            <th>Year</th>
                                            <th  class="bg-primary text-white">Grade</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Reg. number</th>
                                            <th>Year</th>
                                            <th class="bg-primary text-white">Grade</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $row = $results->viewToStandardize($courseId, $sem, $year, 0);
                                    foreach($row as $rw){
                                    echo "<tr>
                                    <td>" .$rw['course_code']."</td>
                                    <td>" .$rw['reg_number']."</td>
                                    <td>" .$rw['year']."</td>
                                    <td class='text-primary'><b>" .$rw['grade']."%</b></td>
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
                                                                        <input type="hidden" name="cID" value="<?php echo $courseId ?>">
                                                                        <input type="hidden" name="year" value="<?php echo $year ?>">
                                                                        <input type="hidden" name="sem" value="<?php echo $sem ?>">
                                                                         <div class="row">
                                                                            <!-- Form -->
                                                                            <?php
                                                                              
                                                                           $semester = new ResultView();
                                                                           $resu = $semester->viewGrading($program);
                                                                           ?>
                                                                            <div class="form-group mb-4 col-lg-6">
                                                                                <label for="exampleInputEmailCard1">Get the Z score for: <?php echo $resu['distinction']/100; ?></label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-percent"></span></span>
                                                                                    <input type="number" name="distinct" step="0.01" class="form-control" id="exampleInputEmailCard1" required>
                                                                                </div>  
                                                                            </div>
                                                                                <!-- Form -->
                                                                                <div class="form-group mb-4 col-lg-6">
                                                                                    <label for="exampleInputPasswordCard1">Get the Z score for: <?php echo $resu['credit']/100; ?></label></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-percent"></span></span>
                                                                                        <input type="number" name="credit"  step="0.01" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                         </div>
                                                                                <div class="row">
                                                                                <!-- Form -->
                                                                                <div class="form-group mb-4 col-lg-6">
                                                                                    <label for="exampleInputPasswordCard1">Get the Z score for: <?php echo $resu['pass']/100; ?></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-percent"></span></span>
                                                                                        <input type="number" name="pass"  step="0.01" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                                  <!-- Form -->
                                                                                  <div class="form-group mb-4 col-lg-6">
                                                                                    <label for="exampleInputPasswordCard1">Get the Z score for: <?php echo $resu['supplementary']/100; ?></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-percent"></span></span>
                                                                                        <input type="number" name="supp"  step="0.01" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                                </div>
                                                                                <!-- Form -->
                                                                                <div class="form-group mb-4">
                                                                                    <label for="exampleInputPasswordCard1">Get the Z score for: <?php echo $resu['repeat_course']/100; ?></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-percent"></span></span>
                                                                                        <input type="number" name="rep"  step="0.01" class="form-control" id="exampleInputPasswordCard1" required>
                                                                                    </div>  
                                                                                </div>
                                                                                <!-- End of Form -->
                                                                                
                                                                            
                                                                            <button type="submit" name="submit" class="btn btn-block btn-primary">Continue</button>
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

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>



</body>

</html>