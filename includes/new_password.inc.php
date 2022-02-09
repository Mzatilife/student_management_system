<?php
include_once '../includes/classautoloader.inc.php';
session_start();
$msg = "";
if(isset($_POST['submit'])){
  $username = $_SESSION['username'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];

  $uppercase = preg_match('@[A-Z]@', $password1);
  $lowercase = preg_match('@[a-z]@', $password1);
  $number    = preg_match('@[0-9]@', $password1);
  $specialChars = preg_match('@[^\w]@', $password1);

  if(empty($password1) && empty($password2)){
    $msg = "All fields are required";
  }
  elseif($password1 != $password2){
    $msg = "Passwords do not match";
  }
  elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) {
    $msg = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
   }
  else{
    
    $code = new ManageUserContr();
    $result = $code->resetPassword($username, $password1);

    if($result){
      $msg = "Your password has been reset";
      header("refresh:4, url= ../login.php");
    }else{
      $msg = "Cannot reset password"; 
    }


}
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

        <title>Forgot Password</title>

        <!-- Custom fonts for this template-->
        <link
            href="../assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">

        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

        <script>
            function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length === 0) {
                    document.getElementById("msg").innerHTML = "";
                    return;
                }
                // Create an array and push all possible values that you want in password
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]"); // Special Charector
                matchedCase.push("[A-Z]");      // Uppercase Alpabates
                matchedCase.push("[0-9]");      // Numbers
                matchedCase.push("[a-z]");     // Lowercase Alphabates

                // Check the conditions
                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "<b>very weak</b>";
                        color = "red";
                        break;
                    case 3:
                        strength = "<b>medium</b>";
                        color = "orange";
                        break;
                    case 4:
                        strength = "<b>strong</b>";
                        color = "green";
                        break;
                }
                document.getElementById("msg").innerHTML = strength;
                document.getElementById("msg").style.color = color;
            }
            function checkPass()
            {
                //Store the password field objects into variables ...
                var password = document.getElementById('password2');
                var confirm  = document.getElementById('confirm2');
                //Store the Confirmation Message Object ...
                var message = document.getElementById('confirm-message2');
                //Set the colors we will be using ...
                var good_color = "#66cc66";
                var bad_color  = "#ff6666";
                if(password.value == confirm.value){
                    confirm.style.backgroundColor = good_color;
                }else{
                    confirm.style.backgroundColor = bad_color;
                }
            }
        </script>

    </head>

    <body class="bg-gradient-info">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-password-image">
                                    <img
                                        src="../assets/images/login.jpg"
                                        alt="login img"
                                        style="width:110%; height:100%;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <?php
                                    if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-info text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                    ?>
                                            <p class="mb-4">Reset and confirm the new password!</p>
                                        </div>
                                        <form
                                            class="user"
                                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                            method="POST">
                                            <p class="text-center" id="msg"></p>
                                            <div class="form-group">
                                                <input
                                                    type="password"
                                                    class="form-control form-control-user"
                                                    id="password2"
                                                    title="8 or more characters required"
                                                    name="password1"
                                                    minlength="8"
                                                    onkeyup="checkPass(); validatePassword(this.value);"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Enter password..."
                                                    required="required">
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="password"
                                                    class="form-control form-control-user"
                                                    id="confirm2"
                                                    title="8 or more characters required"
                                                    name="password2"
                                                    minlength="8"
                                                    onkeyup="checkPass();"
                                                    aria-describedby="emailHelp"
                                                    placeholder="confirm password..."
                                                    required="required">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                                Reset
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="../login.php">Everything is alright? Login!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

    </body>

</html>