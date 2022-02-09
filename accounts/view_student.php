<?php
include_once '../includes/classautoloader.inc.php';
include '../includes/session.inc.php';

if(isset($_POST['submit'])){
    $id = $_POST['cid'];
    $paid = $_POST['paid'];
    $balance = $_POST['balance'];
    
    $edit = new AccountContr();
    $msg = $edit->editRecord($id, $paid, $balance);
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

    <title>Accounts|Records</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
  <div class="col-12 mb-4">
    <div class="card border-light p-0">
        <?php
        $regNo = $_SESSION['id'];
        $pass =  new AccountView();
        $row = $pass->viewStudent($regNo);
        ?>
        <div class="card-body pb-5">
            <div class="row">
                <img
                src="../assets/images/logo.svg" style="width: 5%;"
                class="user-avatar large-avatar rounded-circle mt-n7"
                alt="image">
                <h5 style="margin-left:auto; margin-top:10px;"><?php echo $regNo; ?></h5>
            </div>
            <hr>
                             <?php
                                        foreach($row as $rw){
                                            echo "
 <div class = 'card' >
 <div class='card-header py-3 row'>
 <h6 class='m-0 font text-secondary'><b class='mr-3'>SEM: <span>".$rw['semester']."</span></b>| <b class='mr-3 ml-3'>Amount Paid
        : K <span id='amountpaid".$rw['account_id']."'>".$rw['amount_paid']."</span></b>|<b class='mr-3 ml-3'> Balance: K
        <span id='balance".$rw['account_id']."'>".$rw['balance']."</span></b>| <b class='mr-3 ml-3'>Date: ".$rw['date']."</b>
</h6>";
?>
<div class="btn-group" style="margin-left:auto;">
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
        <a
            class="dropdown-item"
            href="#collapseCardExample<?php echo $rw['account_id'];?>"
            data-toggle="collapse"
            role="button"
            aria-expanded="true"
            aria-controls="collapseCardExample">
            <span class="fas fa-eye mr-2"></span>View Details</a>
      <button
    type="button"
    class="dropdown-item edit"
    value="<?php echo $rw['account_id'] ?>">
    <span class="fas fa-edit mr-2"></span>Edit</button>
    </div>
</div>
</div>
<div class="collapse" id="collapseCardExample<?php echo $rw['account_id'];?>">
<div class="table-responsive">
<table class="table mb-0 rounded">
        <tbody>
        <?php
        $result = $pass->viewArchives($regNo, $rw['semester']);
        foreach ($result as $key) {
        ?>
        <tr>
            <td><b>Amount:</b><i> K <?php echo number_format($key['paid']); ?></i></td>
            <td><b>Date:</b><i> <?php echo $key['date']; ?></i></td>
        </tr>
        <?php } ?>
            
        </tbody>
    </table>
</div>
</div>
</div>
<?php } ?>
                                    

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
        <!-- Form -->
        
        <input type="number" name="cid" id="eid" hidden>
        <!-- End of Form -->
        <div class="form-group">
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="ename">Amount Paid</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-book"></span></span>
                    <input type="number" name="paid" class="form-control" id="epaid" required>
                </div>
            </div>
            <!-- End of Form -->
            <!-- Form -->
            <div class="form-group mb-4">
                <label for="ename">Balance</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">
                        <span class="fas fa-book"></span></span>
                    <input type="number" name="balance" class="form-control" id="ebalance" required>
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
var paid = $('#amountpaid' + id).text();
var blnce = $('#balance' + id).text();

$('#edit').modal('show');
$('#epaid').val(paid);
$('#ebalance').val(blnce);
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

</body>

</html>