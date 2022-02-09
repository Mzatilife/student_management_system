<?php
class Standardize extends Dbh{
    protected function uploadsRequest($crseID, $code, $year, $sem)
    {
       $result = $this->checksRequest($crseID, $code, $year, $sem);

       if ($result) {
        $sql2 = "INSERT INTO `std_requests` (`course_id`, `program_code`, `year`, `semester`, `status`) VALUES (?, ?, ?, ?, '0')";
        $stmt2 = $this->connect()->prepare($sql2);
        $result = $stmt2->execute([$crseID, $code, $year, $sem]);

        if ($result) {
            return $msg = "Request sent!";
        }else{
            return $msg = "Cannot send request!";
        }
        }else{
        return $msg = "Request already sent!";
        }
    }
    protected function checksRequest($crseID, $year, $sem)
    {
        $sql = "SELECT * FROM `std_requests` WHERE `course_id`=? AND `year`=? AND `semester` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$crseID, $year, $sem]);

        if($stmt -> rowCount() == 0){
             return true;
        }else{
            return false;
        }
    }
    protected function viewsRequest($code)
    {
        $sql = "SELECT * FROM `std_requests` INNER JOIN `course_details` ON course_details.course_id = std_requests.course_id WHERE std_requests.program_code = ? AND std_requests.status='0' ORDER BY std_requests.request_id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
        return $stmt->fetchAll();
    }
    protected function viewsStandard($id)
    {
        $sql = "SELECT * FROM `std_requests` WHERE `request_id` = ? AND `status`='0'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}


?>