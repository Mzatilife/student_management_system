<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';

$upload = new ManageCoursesContr;

if (isset($_POST['upload'])){
$msg = $upload -> addCsv($_FILES['csv']['tmp_name'], $program);  
}

if (isset($_POST['add'])){
    $msg = $upload -> addCourse($_POST['code'], $_POST['name'], $_POST['sem'], $program);  
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

        <title>HOD | Add Courses</title>

        <!-- Custom fonts for this template-->
        <link
            href="../assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">
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
                <section
                    class="no-padding-top no-padding-bottom d-flex align-items-center justify-content-center">
                    <div class="card shadow mb-4 col-lg-8">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <div class="dropdown no-arrow">
                                <a
                                    class="dropdown-toggle"
                                    href="#"
                                    role="button"
                                    id="dropdownMenuLink"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Select:</div>
                                    <a class="dropdown-item" href="#modal-form" data-toggle='modal'>Use CSV</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div
                                class="col-lg-12 text-center text-md-center card border-light components-section">
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
                                    <form
                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                        method="POST">

                                        <div class="form-group">
                                            <label class="form-control-label">Course Code</label>
                                            <input
                                                type="text"
                                                name="code"
                                                placeholder="course code"
                                                class="form-control"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Course Name</label>
                                            <input
                                                type="text"
                                                name="name"
                                                placeholder="Course name"
                                                class="form-control"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Semester</label>
                                            <input
                                                type="number"
                                                name="sem"
                                                placeholder="semester"
                                                class="form-control"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add Course" name="add" class="btn btn-info">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

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
                            <p class="modal-title" id="modal-title-notification">Upload CSV file</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="card border-light p-4">
                                <div class="card-body">
                                    <div
                                        class="col-lg-12 text-center text-md-center card border-light components-section">
                                        <div class="block">
                                            <form
                                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                                method="POST"
                                                class="mt-4"
                                                enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <!-- Form -->
                                                    <div class="form-file mb-3">
                                                        <input
                                                            type="file"
                                                            accept=".csv"
                                                            name="csv"
                                                            class="form-control"
                                                            id="customFile"
                                                            required="required">
                                                    </div>
                                                    <!-- End of Form -->
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="upload" class="btn btn-info">Upload Courses</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>