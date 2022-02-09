<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
include 'delete.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DOS | Hostels</title>

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hostels</h1>
                        <a href="addhostels.php" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Hostel</span>
                                    </a>
                    </div>    
                
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hostels</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Hostel Name</th>
                                            <th>Hostel Type</th>
                                            <th>No. of rooms</th>
                                            <th>No. of Beds</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Hostel Name</th>
                                            <th>Hostel Type</th>
                                            <th>No. of rooms</th>
                                            <th>No. of Beds</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $hostels = new HostelView();
                                    $row = $hostels->veiwHostel();
                                    foreach($row as $rw){
                                    echo "<tr>
                                    <td>" .$rw['hostel_name']."</td>
                                    <td>" .$rw['hostel_type']."</td>
                                    <td>" .$rw['no_of_rooms']."</td>
                                    <td>" .$rw['no_of_beds']."</td>
                                    <td>"; ?>
<div class="btn-group">
<button class="btn btn-link text-dark m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="icon icon-sm">
<span class="fas fa-ellipsis-h icon-dark"></span>
</span>
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="hostels.php?delID=<?php echo $rw['hostel_id']; ?>"><span class="fas fa-edit mr-2"></span>Edit</a>
<a class="dropdown-item text-danger" href="hostels.php?delID=<?php echo $rw['hostel_id']; ?>" onclick="return confirm('are you sure you want to delete?')"><span class="fas fa-trash-alt mr-2"></span>Delete</a>
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