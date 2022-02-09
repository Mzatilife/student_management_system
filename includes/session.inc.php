<?php
    //Start session
    session_start();
    
    //Check whether the session variable SESS_MEMBER_ID is present or not
    if(!isset($_SESSION['user_login']) || (trim($_SESSION['user_login']) == '')) {
        header("location: ../login.php");
        exit();
    }
    else{
        $user_id = $_SESSION['user_login'];
        $username = $_SESSION['username'];
        $real_name = $_SESSION['real_name'];
        $program = $_SESSION['program'];
    }
?>