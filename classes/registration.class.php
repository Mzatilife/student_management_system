<?php

class Registration extends Dbh{

    protected function registerUser($user_id, $fname, $lname, $regnumber, $semester, $campus, $nationalid, $nationality, $gender, $DOB, $mailingad, $village, $ta, $district, $marital, $sname, $saddress, $sphone, $semail, $sdistrict, $sta, $gname, $goccupation, $gemail, $gmobile, $gmailing, $hq, $year){
        
        $sql = "SELECT * FROM account_details WHERE reg_number = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$regnumber]);
        if($stmt -> rowCount() == 0){
        return $msg2 = "Please make fees payment";
        }else{

        $row = $stmt->fetch();
        $fees = $row['amount_paid'] + $row['balance'];
        $fees_half = $fees * (50/100);

        if ($row['amount_paid'] < $fees_half) {     
        return $msg2 = "Pay atleast half the total fees";
        }else{
        $sql = "INSERT INTO student_details (`user_id`,`first_name`, `last_name`, `reg_number`, `semester`, `campus`,`nationalid`, `nationality`, `gender`, `date_of_birth`, `mailing_address`, `village`, `traditional_authority`, `district`, `marital`, `spouse_name`, `spouse_address`, `spouse_phone`, `spouse_email`, `spouse_district`, `straditional_authority`, `guardian_name`, `guardian_occupation`, `guardian_email`, `guardian_mobile`, `guardian_mailing`, `highest_qualification`, `year_obtained`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        if($stmt->execute([$user_id, $fname, $lname, $regnumber, $semester, $campus, $nationalid, $nationality, $gender, $DOB, $mailingad, $village, $ta, $district, $marital, $sname, $saddress, $sphone, $semail, $sdistrict, $sta, $gname, $goccupation, $gemail, $gmobile, $gmailing, $hq, $year]))
        {
         return $msg = "You have registered";
      }
    }
    }
    }
    protected function viewStudent($type1){
        $sql = "SELECT * FROM student_details WHERE reg_number = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type1]);
        if($stmt -> rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    protected function semesterView($student){
        $sql = "SELECT * FROM student_details WHERE reg_number = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student]);
        return $stmt->fetch();
    }
    
    protected function enrollsToNextSem($username, $sem, $passrate)
    {
        $type = "end";

        $sql5 = "SELECT * FROM `result_details` WHERE `reg_number` = ? AND `semester` = ? AND `status`='1' AND `exam_type` = ? AND `year`= (SELECT MAX(year) FROM `result_details` WHERE `reg_number`=? AND `semester`=? AND `exam_type`=?)";
        $stmt5 = $this->connect()->prepare($sql5);
        $stmt5->execute([$username, $sem, $type, $username, $sem, $type]);
        $over5 = $stmt5->rowCount();
    
        if ($over5 == 0) {
        return $msg2 = "There are no semester ".$sem." results";
        }else{

        $sql = "SELECT * FROM `result_details` WHERE `reg_number` = ? AND `semester` = ? AND `status`='1' AND `exam_type` = ? AND `grade` < ? AND `year`= (SELECT MAX(year) FROM `result_details` WHERE `reg_number`=? AND `semester`=? AND `exam_type`=?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $sem, $type, $passrate, $username, $sem, $type]);
        $over = $stmt -> rowCount();
    
        if ($over > 3) {
            return $msg2 = "you were withdrawn!";
        }elseif($over == 3){
            return $msg2 = "you are repeating the semester!";
        }else{
        $Sem = $sem+1;
        $sql2 = "SELECT * FROM account_details WHERE reg_number = ? AND semester = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$username, $Sem]);

        if($stmt2 -> rowCount() == 0)
        {
        return $msg2 = "Please pay the fees!";
        }
        else{
        $row = $stmt2->fetch();
        $fees = $row['amount_paid'] + $row['balance'];
        $fees_half = $fees * (50/100);

        if ($row['amount_paid'] < $fees_half) {     
        return $msg2 = "Pay atleast half the total fees";
        }else{
            $sql3 = "UPDATE student_details SET semester = ? WHERE reg_number = ?";
            $stmt3 = $this->connect()->prepare($sql3);
            $res = $stmt3->execute([$Sem, $username]);

            if ($res) {
            return $msg2 = "You have enrolled";
            }else{
            return $msg2 = "You can't enroll";
            }
        }

        }
    }
}
   }

   protected function viewsStudent($id)
   {
    $sql = "SELECT * FROM student_details INNER JOIN user_details ON student_details.user_id = user_details.user_id WHERE student_details.user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
   }

   protected function viewsSingleStudent($id)
   {
    $sql = "SELECT * FROM student_details WHERE student_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
   }
}