<?php
    if (isset($_GET['delID'])) {
	$delID = $_GET['delID'];
    $delete = new ManageCoursesContr();
    $row = $delete->deleteCourse($delID);
    }
?>