<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';
include 'delete.php';
if(isset($_POST['submit'])){
    $id = $_POST['cid'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $faculty = $_POST['faculty'];
    
    $edit = new ProgramContr();
    $msg = $edit->editProgram($id, $name, $code, $faculty);
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

        <title>Registrar|programs</title>

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
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <link href="../assets/css/bootstrap-select.css" rel="stylesheet" type="text/css">

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
                    <h1 class="h3 mb-0 text-gray-800">Programs</h1>
                    <a href="addprogram.php" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Program</span>
                    </a>
                </div>

                <div class="col-lg-12">

                    <!-- Year One -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3"></div>
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Program Code</th>
                                                    <th>Program Name</th>
                                                    <th>Faculty Name</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Program Code</th>
                                                    <th>Program Name</th>
                                                    <th>Faculty Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php

                                    $program = new ProgramView();
                                    $row = $program->viewPrograms();
                                    foreach($row as $rw){
                                    echo "<tr>
                                    <td><span id='programcode".$rw['program_id']."'>" .$rw['program_code']."</span></td>
                                    <td><span id='programname".$rw['program_id']."'>" .$rw['program_name']."</span></td>
                                    <td><span id='facultyname".$rw['program_id']."'>" .$rw['faculty_name']."</span></td>";
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
                                                                value="<?php echo $rw['program_id'] ?>">
                                                                <span class="fas fa-edit mr-2"></span>Edit</button>
                                                            <a
                                                                class="dropdown-item text-danger"
                                                                href="programs.php?delpgID=<?php echo $rw['program_id']; ?>"
                                                                onclick="return confirm('are you sure you want to delete?')">
                                                                <span class="fas fa-trash-alt mr-2"></span>Delete</a>
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
        <!-- /.container-fluid -->
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
<div class="modal-body p-0">
<div class="card border-light p-4">
<div class="card-body">
    <form
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="POST"
        class="mt-4">
     <div class="form-group">
    <label class=" form-control-label">Faculty Name</label>
    <select
        class="form-control selectpicker"
        data-live-search="true"
        name="faculty">
        <?php 
        $faculty = new ProgramView();
        $result = $faculty->viewFaculties();
        foreach ($result as $value) {
        echo "<option value='".$value['faculty_id']."'>".$value['faculty_name']."</option>";
            }
        ?>
    </select>
</div>
        <!-- Form -->
        
        <input type="number" name="cid" id="eid" hidden>
        <!-- End of Form -->
        <div class="form-group">
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="ecode">Program code</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-code"></span></span>
                    <input type="text" name="code" class="form-control" id="ecode" required>
                </div>
            </div>
            <!-- End of Form -->
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="ename">Program Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-file"></span></span>
                    <input type="text" name="name" class="form-control" id="ename" required>
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
<script>
$(document).ready(function () {
$(document).on('click', '.edit', function () {
var id = $(this).val();
var code = $('#programcode' + id).text();
var name = $('#programname' + id).text();
var faculty = $('#facultyname' + id).text();

$('#edit').modal('show');
$('#ename').val(name);
$('#ecode').val(code);
$('#efaculty').val(faculty);
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
    <script src="../assets/js/bootstrap-select.js"></script>

</body>

</html>