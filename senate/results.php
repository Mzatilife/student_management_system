<?php
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';
if(isset($_GET['code'])){
    $code = $_GET['code'];
    $_SESSION['code'] = $code;
    header("location: viewdetails.php");
}
if(isset($_GET['app'])){
    $approve = new ResultContr();
    $msg = $approve->approveGrades();
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

    <title>Senate|Results</title>

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
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Faculties</h6>
                                    <a href="results.php?app=1" class="btn btn-info float-right"><b>Approve All</b></a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
<div class="row">
<?php 
$program = new ProgramView();
$fc = $program->viewFaculties();
foreach($fc as $fac){ ?>
<div class="col-lg-6">
<!-- Year One -->
<div class="card mb-4">
<!-- Card Header - Accordion -->
<a href="#collapseCardExample<?php echo $fac['faculty_id'];?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
<h6 class="m-0 font-weight-bold text-primary"><?php echo $fac['faculty_name'];?></h6>
</a>
<!-- Card Content - Collapse -->
<div class="collapse" id="collapseCardExample<?php echo $fac['faculty_id'];?>">
<div class="card-body">
                                <!-- Form -->
                                <?php 
                                    $row = $program->viewProgram($fac['faculty_id']);
                                    foreach($row as $rw){ ?>
                                    <a href="results.php?code=<?php echo $rw['program_code']; ?>" class="btn btn-outline-info btn-block"><?php echo $rw['program_name']; ?></a>            
                                    <?php } ?>
                                                <!-- End of Form -->
</div>
</div>
</div>
</div>
<?php } ?>
</div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card mb-4">
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                     
                                <img class="img-fluid w-100 " src="../assets/images/real (1).svg" alt="404 not found">
                                <div class="col-md-12">
                                <p class="lead" style="text-align: justify;">Choose a faculty and then select and navigate through the programs
                                to authorize standardization. After altering the grades, approve all the grades to allow the students access the grades.</p>
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