<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
if (isset($_POST['add'])) {
    $lecturer = $_POST['lecturer'];
	$courseID=$_POST['courseID'];
    $update = new ManageCoursesContr();
    $update->lecturerSet($courseID, $lecturer);
}
if (isset($_POST['view'])) {
    $_SESSION['courseid'] = $_POST['courseID'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['sem'] = $_POST['semester'];
    $_SESSION['status'] = 0;

    header("location: view_results.php");
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

    <title>HOD | Results</title>

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
                           <!-- DataTales Example -->
                           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Results</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Course</th>
                                            <th>Sem.</th>
                                            <th>Total</th>
                                            <th class="bg-danger text-white">Repeat</th>
                                            <th class="bg-warning text-white">Sup.</th>
                                            <th class="bg-info text-white">Pass</th>
                                            <th class="bg-success text-white">Credit</th>
                                            <th class="bg-success text-white">Dstnct.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Course</th>
                                            <th>Sem.</th>
                                            <th>Total</th>
                                            <th class="bg-danger text-white">Repeat</th>
                                            <th class="bg-warning text-white">Sup.</th>
                                            <th class="bg-info text-white">Pass</th>
                                            <th class="bg-success text-white">Credit</th>
                                            <th class="bg-success text-white">Dstnct.</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    
                                    $semester = new ResultView();

                                    $result = $semester->selectDistinct($program, 0);
                                    $rate = $semester->viewGrading($program);
                                    
                                    $pass = $rate['pass'];
                                    $credit = $rate['credit'];
                                    $supp = $rate['supplementary'];
                                    $distinct = $rate['distinction'];

                                    if(!empty($result)){
                                    foreach($result as $res){
                                        $course_id = $res['course_id'];
                                        $semster = $res['semester'];
                                        $year = $res['year'];
                                       
                    
$course = new ResultView();
$crse = new ManageCoursesView();
$resu = $crse->viewCourse($course_id);
$stu = $course->countStudents($course_id, $semster, $year, 0);
echo "<tr>
<td>" .$resu['course_code']."</td>
<td>" .$resu['course_name']."</td>
<td>" .$semster."</td>
<td>" .$stu."</td>";
$row = $course->analyseResult($course_id, $semster, $year, 0, 0, $supp-1);
echo "<td>".$row."</td>";
$ans = $course->analyseResult($course_id, $semster, $year, 0, $supp, $pass-1);
echo "<td>".$ans."</td>";
$row = $course->analyseResult($course_id, $semster, $year, 0, $pass, $credit-1);
echo "<td>".$row."</td>";
$ans = $course->analyseResult($course_id, $semster, $year, 0, $credit, $distinct-1);
echo "<td>".$ans."</td>";
$ans = $course->analyseResult($course_id, $semster, $year, 0, $distinct, 100);
echo "<td>".$ans."</td>";
?>
<td>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<input type="number" name="courseID" value="<?php echo $resu['course_id']; ?>" hidden>
<input type="number" name="year" value="<?php echo $year; ?>" hidden>
<input type="number" name="semester" value="<?php echo $semster; ?>" hidden>
<button type="submit" name="view" class="btn btn-info btn-sm ml-2"><span class="fa fa-eye mr-2"></span>view</button>
</form>
</td>
</tr>
 
<?php }}?>
                                        
                                    </tbody>
                                </table>
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

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>