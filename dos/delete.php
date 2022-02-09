<?php
    if (isset($_GET['delID'])) {
	$delID = $_GET['delID'];
    $delete = new HostelContr();
    $row = $delete->deleteHostel($delID);
    }
    if (isset($_GET['allID'])) {
        $approve = new HostelContr();
        $row = $approve->makeAllocation();
    }
    if (isset($_GET['resetID'])) {  
        $reset = new HostelContr();
        $row = $reset->resetAllocation();
    }
    if (isset($_GET['delID2'])) {
        $delID = $_GET['delID2'];
        $delete = new HostelContr();
        $row = $delete->deleteAllocation($delID);
        }
    
?>