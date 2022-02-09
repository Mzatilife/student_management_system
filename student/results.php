<?php
include '../includes/session.inc.php';
include '../includes/classautoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student | Results</title>

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
                    <?php
                                    
                                    $semester = new ResultView();

                                    $result = $semester->viewSemester($username);
                                    $rate = $semester->viewGrading($program);
                                    
                                    $passRate = $rate['pass'];
                                    $repeatRate = $rate['supplementary'];

                                    if(!empty($result)){
                                    foreach($result as $res){
                                    $semesterNo = $res['semester'];

                                    $fees = new accountView();
                                    $verify = $fees->feesVerify($username, $semesterNo);

                                    if ($verify) {
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Semester <?php echo $semesterNo; ?> results</h6>
                        </div>
                        <div class="card-body">
                        <div class="col-xl-12 col-md-2 mb-4">
                            <div class="card border-left-primary h-100 py-2">
                            <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Overrall</div>
                                                <?php
                                    $overall = new ResultView();
                                    $over = $overall->viewOverall($semesterNo, $username, 'end', $passRate, $repeatRate);
                                    $rep = $overall->viewRepeat($semesterNo, $username, 'end', $repeatRate);
                                    $sum = $rep + $over;

                                    if ($sum >= 4 ) {   
                                         echo "<div class='h5 mb-0 font-weight-bold text-danger'>withdrawn</div>";
                                    }
                                    elseif ($sum == 3) {   
                                    echo "<div class='h5 mb-0 font-weight-bold text-danger'>Repeat Semester</div>";
                                    }
                                    elseif (($rep == 2 || $rep == 1) && $over == 0) {
                                    if ($rep == 1){
                                    echo "<div class='h5 mb-0 font-weight-bold text-danger'>1 repeat course</div>";
                                    }else{
                                    echo "<div class='h5 mb-0 font-weight-bold text-danger'>Repeat Semester</div>";
                                    }
                                    }
                                    elseif(($over == 2 || $over == 1) && $rep == 0){
                                    echo "<div class='h5 mb-0 font-weight-bold text-warning'>".$over." sup. exam</div>";
                                    }
                                    elseif($over == 1 && $rep == 1){
                                    echo "<div class='h5 mb-0 font-weight-bold text-danger'>sup. and repeat</div>";
                                    }
                                    elseif ($over == 0 && $rep == 0) {
                                        $average = new ResultView();
                                        $row = $average->averageResult($semesterNo, $username, 'end');
                                        if ($row['AVG(grade)'] >= $rate['pass']) {   
                                        echo "<div class='h5 mb-0 font-weight-bold text-success'>Pass</div>";
                                        }elseif ($row['AVG(grade)'] >= $rate['credit']) {   
                                        echo "<div class='h5 mb-0 font-weight-bold text-success'>Credit</div>";
                                        }elseif ($row['AVG(grade)'] >= $rate['distinction'] ) {   
                                            echo "<div class='h5 mb-0 font-weight-bold text-success'>Distinction</div>";
                                        }
                                    }
                                    ?>
                                        </div>
                                        <div class="col-auto">
                                        <?php
                                    $average = new ResultView();
                                    $row = $average->averageResult($semesterNo, $username, 'end');
                                    if ($row['AVG(grade)'] < $passRate) {
                                    echo "<i class='fa-2x text-danger'>".number_format($row['AVG(grade)'])."%</i>";
                                    }elseif ($row['AVG(grade)'] <  $rate['credit']) {
                                        echo "<i class='fa-2x text-info'>".number_format($row['AVG(grade)'])."%</i>";
                                    }elseif ($row['AVG(grade)'] >= $rate['credit']) {
                                        echo "<i class='fa-2x text-success'>".number_format($row['AVG(grade)'])."%</i>";
                                    }         
                                    ?> 
                                        </div>
                                    </div>
                                </div>              
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-border-bottom" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Course Name</th>
                                            <th  style="width:15%;">Grade</th>
                                            <th style="width:15%;">Remark</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Course Name</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $results = new ResultView();
                                    $row = $results->viewStudent($semesterNo, $username, 'end');
                                    foreach($row as $rw){
                                        $distinction = $rate['distinction'];
                                        $credit = $rate['credit'];
                                        $pass = $rate['pass'];
                                        $sup = $rate['supplementary'];
                                        $repeat = $rate['repeat_course'];
                                    
                                    echo "<tr>
                                    <td>" .$rw['course_code']."</td>
                                    <td>" .$rw['course_name']."</td>";
                                    if ($rw['grade'] >= $distinction) {
                                    echo "<td class =' text-success'><span class='font-weight-bold'>".$rw['grade']."%</span></td>
                                          <td><span class='font-weight-bold bg-success text-white btn btn-sm'>Distinction</span></td>";
                                    }elseif($rw['grade'] >= $credit){
                                    echo "<td class =' text-success'><span class='font-weight-bold'>".$rw['grade']."%</span></td>
                                         <td ><span class='font-weight-bold bg-success text-white btn btn-sm'>Credit</span></td>";
                                    }elseif($rw['grade'] >= $pass){
                                    echo "<td class =' text-info'><span class='font-weight-bold'>".$rw['grade']."%</span></td>
                                    <td><span class='font-weight-bold bg-info text-white btn btn-sm'>Pass</span></td>";
                                    }elseif($rw['grade'] >= $sup){
                                    echo "<td class =' text-warning'><span class='font-weight-bold'>".$rw['grade']."%</span></td>
                                    <td><span class='font-weight-bold bg-warning text-white btn btn-sm'>Sup.</span></td>";
                                    }elseif($rw['grade'] >= $repeat){
                                    echo "<td class =' text-danger'><span class='font-weight-bold'>".$rw['grade']."%</span></td>
                                    <td><span class='font-weight-bold bg-danger text-white btn btn-sm'>Repeat</span></td>";
                                    }
                                    echo "</tr>";
                                     }

                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php }else{ 
                      include "../includes/clearfees.inc.php";
                    } } } else{ 
                    include "../includes/noresults.inc.php"; 
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
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>


</body>

</html>