<?php
    if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
    $status = "deactivated";
    $course = new ManageUserContr();
    $row = $course->deactivateUser($userID, $status);
    }
    if (isset($_GET['delID'])) {
        $delID = $_GET['delID'];
        $course = new ManageUserContr();
        $row = $course->deleteUser($delID);
    }
    if (isset($_GET['actID'])) {
        $actID = $_GET['actID'];
        $status = "active";
        $course = new ManageUserContr();
        $row = $course->deactivateUser($actID, $status);
    }

?>