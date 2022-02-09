<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOD|Student Details</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css">
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
                           <!-- DataTales Example -->
                           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;"  class="bg-secondary text-white">#</th>
                                            <th style="width: 15%;" class="bg-primary text-white">Col 1</th>
                                            <th>Col 2</th>
                                            <th style="width: 15%;" class="bg-primary text-white">Col 3</th>
                                            <th>Col 4</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th style="width: 3%;" class="bg-secondary text-white">#</th>
                                            <th class="bg-primary text-white">Col 1</th>
                                            <th>Col 2</th>
                                            <th class="bg-primary text-white">Col 3</th>
                                            <th>Col 4</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$id = $_GET['id'];

$stu =  new RegistrationView();
$row = $stu -> viewSingleStudent($id);
?>
 <tr>
     <td><b>1</b></td>
     <td><b>Name</b></td>
     <td><?php echo $row['first_name'];?></td>
     <td><b>Last Name</b></td>
     <td><?php echo $row['last_name'];?></td>
 </tr>
 <tr>
 <td><b>2.</b></td>
     <td><b>Sex</b></td>
     <td><?php echo $row['gender'];?></td>
     <td><b>DOB</b></td>
     <td><?php echo $row['date_of_birth'];?></td>
 </tr>
 <tr>
 <td><b>3.</b></td>
     <td><b>Reg #</b></td>
     <td><?php echo $row['reg_number'].", ".$row['campus'];?></td>
     <td><b>Nationality</b></td>
     <td><?php echo $row['nationality'];?></td>
 </tr>
 <tr>
 <td><b>4.</b></td>
     <td><b>Mailing Address</b></td>
     <td><?php echo $row['mailing_address'];?></td>
     <td><b>Village</b></td>
     <td><?php echo $row['district'].", ".$row['village'].", ".$row['traditional_authority'];?></td>
 </tr>
 <tr>
 <td><b>5.</b></td>
     <td><b>Marital Status</b></td>
     <td><?php echo $row['marital'];?></td>
     <td><b>Spouse Details</b></td>
     <?php if ($row['marital'] == 'single') { ?>
     <td> ---------- </td>   
     <?php }else{ ?>
     <td><?php echo $row['spouse_name']."<br>".$row['spouse_email']."<br>".$row['spouse_phone'];?></td>
     <?php } ?>
 </tr>
 <tr>
 <td><b>6.</b></td>
     <td><b>Gurdian Name</b></td>
     <td><?php echo $row['guardian_name'].", (".$row['guardian_occupation'].")";?></td>
     <td><b>Gurdian Details</b></td>
     <td><?php echo $row['guardian_mailing']."<br>".$row['guardian_email']."<br>".$row['guardian_mobile'];?></td>
 </tr>
 <tr>
 <td><b>7.</b></td>
     <td><b>Highest Qualification</b></td>
     <td><?php echo $row['highest_qualification'];?></td>
     <td><b>Year Obtained</b></td>
     <td><?php echo $row['year_obtained'];?></td>
 </tr>
                                        
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

</body>

</html>