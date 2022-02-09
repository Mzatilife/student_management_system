<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';
include 'delete.php';
if(isset($_POST['submit'])){
$id = $_POST['cid'];
$name = $_POST['name'];
$code = $_POST['code'];
$sem = $_POST['sem'];

$edit = new ManageCoursesContr();
$msg = $edit->editCourse($id, $name, $code, $sem);
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

        <title>HOD | Courses</title>

        <!-- Custom fonts for this template-->
        <link
            href="../assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">
        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="../assets/images/logo.svg" type="image/svg">
        <script src="../assets/vendor/jquery/jquery.min.js"></script>

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
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <a href="addcourses.php" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Courses</span>
                    </a>
                </div>

                    <div class="col-lg-12">

                        <!-- Year One -->
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a
                                href="#collapseCardExample"
                                class="d-block card-header py-3"
                                data-toggle="collapse"
                                role="button"
                                aria-expanded="true"
                                aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Name</th>
                                                            <th>Code</th>
                                                            <th>Semester</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Course Name</th>
                                                            <th>Code</th>
                                                            <th>Semester</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php

                                    $course = new ManageCoursesView();
                                    $row = $course->coursesView('1', '48', $program);
                                    foreach($row as $rw){
                                        echo "<tr>
                                        <td><span id='coursename".$rw['course_id']."'>" .$rw['course_name']."</span></td>
                                        <td><span id='coursecode".$rw['course_id']."'>" .$rw['course_code']."</span></td>
                                        <td><span id='semester".$rw['course_id']."'>" .$rw['semester']."</span></td>";
                                         ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-link text-dark m-0 p-0"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="icon icon-sm">
                                                            <span class="fas fa-ellipsis-h icon-dark"></span>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button
                                                            type="button"
                                                            class="dropdown-item edit"
                                                            value="<?php echo $rw['course_id'] ?>">
                                                            <span class="fas fa-edit mr-2"></span>Edit</button>
                                                        <a
                                                            class="dropdown-item text-danger"
                                                            href="courses.php?delID=<?php echo $rw['course_id']; ?>"
                                                            onclick="return confirm('are you sure you want to delete?')">
                                                            <span class="fas fa-trash-alt mr-2"></span>Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
<div
class="modal fade"
id="edit"
tabindex="-1"
role="dialog"
aria-labelledby="modal-form"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <p class="modal-title" id="modal-title-notification">Edit Course</p>
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
        <!-- Form -->
        <div class="form-group mb-4">
            <label for="ename">Course Name</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <span class="fas fa-file"></span></span>
                <input type="text" name="name" class="form-control" id="ename" required>
            </div>
        </div>
        <input type="number" name="cid" id="eid" hidden>
        <!-- End of Form -->
        <div class="form-group">
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="ecode">Course Code</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-code"></span></span>
                    <input type="text" name="code" class="form-control" id="ecode" required>
                </div>
            </div>
            <!-- End of Form -->
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="esem">Semester</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-calendar"></span></span>
                    <input type="number" name="sem" class="form-control" id="esem" required>
                </div>
            </div>
            <!-- End of Form -->

        </div>
        <button type="submit" name="submit" class="btn btn-block btn-primary">Edit</button>
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

<script>
$(document).ready(function () {
$(document).on('click', '.edit', function () {
var id = $(this).val();
var name = $('#coursename' + id).text();
var code = $('#coursecode' + id).text();
var sem = $('#semester' + id).text();

$('#edit').modal('show');
$('#ename').val(name);
$('#ecode').val(code);
$('#esem').val(sem);
$('#eid').val(id);
});
});
</script>
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

</body></html>