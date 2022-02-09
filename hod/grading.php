<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
if (isset($_POST['submit'])) {
    $distinction = $_POST['distinction'];
	$credit =$_POST['credit'];
    $pass = $_POST['pass'];
	$supp =$_POST['supp'];
    $repeat = $_POST['repeat'];
    $update = new ResultContr();
    $msg = $update->uploadGrading($distinction, $credit, $pass, $supp, $repeat, $program);
}
if (isset($_POST['edit'])) {
    $distinction = $_POST['distinction'];
	$credit =$_POST['credit'];
    $pass = $_POST['pass'];
	$supp =$_POST['supp'];
    $repeat = $_POST['repeat'];
    $update = new ResultContr();
    $msg = $update->editGrading($distinction, $credit, $pass, $supp, $repeat, $program);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HOD | Results</title>

        <!-- Custom fonts for this template-->
        <link
            href="../assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">
        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link
            href="../assets/vendor/datatables/dataTables.bootstrap4.min.css"
            rel="stylesheet">
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
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a
                            href="#modal-form2"
                            class="btn btn-info btn-icon-split float-left"
                            data-toggle="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-cogs"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>
                        <a
                            href="#modal-form"
                            class="btn btn-info btn-icon-split float-right"
                            data-toggle="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="text">Upload</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Grade Name</th>
                                        <th class="bg-primary text-white">starting grade</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Grade Name</th>
                                        <th class="bg-primary text-white w-25">Starting Grade</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    
                                    $semester = new ResultView();
                                    $resu = $semester->viewGrading($program);
echo "<tr>
<td>Distiction</td>
<td class='text-primary font-weight-bold'>" .$resu['distinction']."%</td>
</tr>
<tr>
<td>Credit</td>
<td class='text-primary font-weight-bold'>" .$resu['credit']."%</td>
</tr>
<tr>
<td>Pass</td>
<td class='text-primary font-weight-bold'>" .$resu['pass']."%</td>
</tr>
<tr>
<td>Supplementary</td>
<td class='text-primary font-weight-bold'>" .$resu['supplementary']."%</td>
</tr>
<tr>
<td>Repeat Course</td>
<td class='text-primary font-weight-bold'>" .$resu['repeat_course']."%</td>
</tr>
";
 
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
    <p class="modal-title" id="modal-title-notification">Upload grading details</p>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
                <div class="modal-body p-0">
                    <div class="card border-light p-4">
                        <div class="card-body">
                            <form
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                method="POST"
                                class="mt-4">
                                <div class="row">
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputEmailCard1">Distinction</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="distinction"
                                                placeholder="course name"
                                                id="exampleInputEmailCard1"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- End of Form -->

                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputPasswordCard1">Credit</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                placeholder="Credit"
                                                name="credit"
                                                class="form-control"
                                                id="exampleInputPasswordCard1"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputPasswordCard1">Pass</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                placeholder="pass"
                                                name="pass"
                                                class="form-control"
                                                id="exampleInputPasswordCard1"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="row">
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="exampleInputEmailCard1">supplementary</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="supp"
                                                placeholder="course name"
                                                id="exampleInputEmailCard1"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- End of Form -->

                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="exampleInputPasswordCard1">Repeat Course</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                placeholder="repeat"
                                                name="repeat"
                                                class="form-control"
                                                id="exampleInputPasswordCard1"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>

                                <button type="submit" name="submit" class="btn btn-block btn-primary">upload</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->

    <!-- Modal Content -->
    <div
        class="modal fade"
        id="modal-form2"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
    <p class="modal-title" id="modal-title-notification">Edit grading details</p>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
                <div class="modal-body p-0">
                    <div class="card border-light p-4">
                        <div class="card-body">
                            <form
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                method="POST"
                                class="mt-4">
                                <?php
                                                                          $semester = new ResultView();
                                                                          $resu = $semester->viewGrading($program);
                                                                        ?>
                                <div class="row">
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputEmailCard1">Distinction</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="distinction"
                                                value="<?php echo $resu['distinction']?>"
                                                id="exampleInputEmailCard1">
                                        </div>
                                    </div>
                                    <!-- End of Form -->

                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputPasswordCard1">Credit</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                value="<?php echo $resu['credit']?>"
                                                name="credit"
                                                class="form-control"
                                                id="exampleInputPasswordCard1">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-4">
                                        <label for="exampleInputPasswordCard1">Pass</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                value="<?php echo $resu['pass']?>"
                                                name="pass"
                                                class="form-control"
                                                id="exampleInputPasswordCard1">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="row">
                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="exampleInputEmailCard1">supplementary</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="supp"
                                                value="<?php echo $resu['supplementary']?>"
                                                id="exampleInputEmailCard1">
                                        </div>
                                    </div>
                                    <!-- End of Form -->

                                    <!-- Form -->
                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="exampleInputPasswordCard1">Repeat Course</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <span class="fas fa-percent"></span></span>
                                            <input
                                                type="number"
                                                value="<?php echo $resu['repeat_course']?>"
                                                name="repeat"
                                                class="form-control"
                                                id="exampleInputPasswordCard1">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>

                                <button type="submit" name="edit" class="btn btn-block btn-primary">Edit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->

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