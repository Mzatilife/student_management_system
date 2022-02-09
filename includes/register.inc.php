<?php
declare(strict_types = 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include_once 'classautoloader.inc.php';

if(isset($_POST['register'])){
$user_type = strip_tags($_POST['usertype']);
$user_program = strip_tags($_POST['program']);
$email = strip_tags($_POST['email']);
$user_name = strip_tags($_POST['username']);
$rname = strip_tags($_POST['rname']);

  $me='';
  $pwdcode='';
  $msg = $msg2 = "";
  $Generator ="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $pwdcode = substr(str_shuffle($Generator),0,8);
   //echo $resetcode;

  $mail = new PHPMailer(true);

   try {
    //Server settings
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'projectmahala@gmail.com';                   
    $mail->Password   = 'projectmahala@24';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    
    //Recipients
    $mail->setFrom('projectmahala@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);                                
    $mail->Subject = "Student Management System :  Login Credentials";
    $mail->Body    = 'Hello, use the details below to log into the Student Management System <br>Password : <b>'.$pwdcode.'</b>.<br>Username: <b>'.$user_name.'</b>';
    $mail->send();
     
    $register = new ManageUserContr;

    try{
     $msg = $register->addUser($user_type, $rname, $user_program, $email, $user_name, $pwdcode);
    }catch(TypeError $e){
      $msg2 = "Error: " .$e->getMessage();
    }

   } catch (Exception $e) {
    $msg2 = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";  
   } 
}

if (isset($_POST['upload'])){
  $file = $_FILES['csv']['tmp_name']; 
  
  $file = fopen($file, 'r');
  while ($row = fgetcsv($file)){ 
      
  $user_type = strip_tags($row['0']);
  $user_program = strip_tags($row['1']);
  $email = strip_tags($row['2']);
  $rname = strip_tags($row['3']);
  $user_name = strip_tags($row['4']);
  
    $me='';
    $pwdcode='';
    $msg = $msg2 = "";
    $Generator ="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pwdcode = substr(str_shuffle($Generator),0,8);
     //echo $resetcode;
  
    $mail = new PHPMailer(true);
  
     try {
      //Server settings
      $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                     
      $mail->isSMTP();                                           
      $mail->Host       = 'smtp.gmail.com';                   
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'projectmahala@gmail.com';                   
      $mail->Password   = 'projectmahala@24';                               
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
      $mail->Port       = 587;                                    
      //Recipients
      $mail->setFrom('projectmahala@gmail.com');
      $mail->addAddress($email);
  
      $mail->isHTML(true);                                
      $mail->Subject = "Student Management System :  Login Credentials";
      $mail->Body    = 'Hello, use the details below to log into the Student Management System <br>Password : <b>'.$pwdcode.'</b>.<br>Username: <b>'.$user_name.'</b>';
      $mail->send();
       
      $register = new ManageUserContr;
  
      try{
       $msg = $register->addUser($user_type, $rname, $user_program, $email, $user_name, $pwdcode);
      }catch(TypeError $e){
        $msg2 = "Error: " .$e->getMessage();
      }
  
     } catch (Exception $e) {
      $msg2 = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";  
     } 
  }
  }
?>