<?php
declare(strict_types = 1);
include_once 'autoloader.inc.php';

if(isset($_POST['login'])){
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

$login = new ManageUserContr();

try{
 $msg = $login->userLogin("$username", "$password");
}catch(TypeError $e){
 $msg =  "Error: " .$e->getMessage();
} 
}

?>