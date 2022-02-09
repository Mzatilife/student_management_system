<?php
declare(strict_types = 1);
include '../includes/session.inc.php';
include_once '../includes/classautoloader.inc.php';
include 'deactivate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|HODs</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Heads of Departments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Reg. #</th>
                                            <th>Username</th>
                                            <th>Program</th>
                                            <th>Email</th>
                                            <th style="width:10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Reg. #</th>
                                            <th>Username</th>
                                            <th>Program</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

$course = new ManageUserView();
$row = $course->specificView('HOD');
foreach($row as $rw){
echo "<tr>
<td>" .$rw['username']."</td>
<td>" .$rw['real_name']."</td>
<td>" .$rw['program']."</td>
<td>".$rw['email']."</td>
<td>";
?>

<div class="btn-group">
<button class="btn btn-link text-dark m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="icon icon-sm">
<span class="fas fa-ellipsis-h icon-dark"></span>
</span>
</button>
<div class="dropdown-menu">

<?php
if ($rw['status']=='active') {
echo "<a class='dropdown-item text-warning' href='hod.php?userID=".$rw['user_id']."'><span class='fas fa-exclamation-triangle mr-2'></span>Deactivate</a>";
}else{
echo "<a class='dropdown-item text-success' href='hod.php?actID=".$rw['user_id']."'><span class='fas fa-exclamation-triangle mr-2'></span>Activate</a>";
}
?>

<a class="dropdown-item text-danger" href="hod.php?delID=<?php echo $rw['user_id']; ?>" onclick="return confirm('are you sure you want to delete?')"><span class="fas fa-trash-alt mr-2"></span>Remove</a>
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