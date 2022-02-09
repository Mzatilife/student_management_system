<?php
    if (isset($_GET['delfcID'])) {
	$delID = $_GET['delfcID'];
    $delete = new ProgramContr();
    $row = $delete->deleteFaculty($delID);
    }
    if (isset($_GET['delpgID'])) {
        $delID = $_GET['delpgID'];
        $delete = new ProgramContr();
        $row = $delete->deleteProgram($delID);
        }
   
    
?>