<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
if (isset($_POST['add'])) {
    $lecturer = $_POST['lecturer'];
	$courseID=$_POST['courseID'];
    $update = new ManageCoursesContr();
    $update->lecturerSet($courseID, $lecturer);
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

        <title>HOD|Lecturers</title>

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
    <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css">
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="../assets/images/logo.svg" type="image/svg">
        <link
            href="../assets/css/bootstrap-select.css"
            rel="stylesheet"
            type="text/css">
        <script src="../assets/vendor/jquery/jquery.min.js"></script>    

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
                        <h6 class="m-0 font-weight-bold text-primary">Course and Lecturer Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th style="width: 10px;">Semester</th>
                                        <th>Lecturer</th>
                                        <th style="width: 7%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Semester</th>
                                        <th>Lecturer</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
$course = new ManageCoursesView();
$row = $course->coursesView('1', '40', $program);

foreach($row as $rw){
echo "<tr>
<td>" .$rw['course_name']."</td>
<td>" .$rw['course_code']."</td>
<td>".$rw['semester']."</td>";

$userBy = new ManageUserView();
$result = $userBy->userById($rw['user_id']);

echo "<td>".$result['real_name']."</td>";
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
                                                            <span class="fas fa-link mr-2"></span>Assign</button>
                                                    </div>
                                                </div>
                                    </td>
                                    <?php 
echo "</tr>";
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
    <p class="modal-title" id="modal-title-notification">Assign Lecturer</p>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
                    <div class="modal-body p-0">
                        <div class="card border-light p-4">
                            <div class="card-body">
                                <!-- Form -->
                                <form
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                    method="post">
                                        <div class="ml-3">
                                            <select
                                                class="form-control selectpicker"
                                                data-live-search="true"
                                                id="country"
                                                name="lecturer"
                                                aria-label="Default select example">
                                                <option selected="selected">Select Lecturer</option>
                                                <?php 
                                                        $course = new ManageUserView();
                                                        $result = $course->lecturerView('lecturer', $program);
                                                        foreach ($result as $value) {
                                                            echo "<option value='".$value['user_id']."'>".$value['real_name']."</option>";
                                                    }
                                                    
                                                    ?>
                                            </select>
                                        <input type="number" name="courseID" id="Cid" hidden>
                                        <button name="add" class="btn btn-info btn-square btn-block mt-5">
                                            <i class="fas fa-link"></i> Assign
                                        </button>
                                    </div>
                                </form>
                                <!-- End of Form -->
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

$('#edit').modal('show');

$('#Cid').val(id);
});
});
</script>

<script>
   $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'print', 'excel', 'pdf', 'csv' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="../assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/buttons.html5.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/buttons.print.min.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/buttons.colVis.min.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.3/js/buttons.colVis.js"></script>
    <script src="../assets/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="../assets/DataTables/Responsive-2.2.5/js/responsive.bootstrap4.min.js"></script>
    
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../assets/js/bootstrap-select.js"></script>

</body>

</html>