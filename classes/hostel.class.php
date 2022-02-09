<?php
class Hostel extends Dbh{

    protected function hostelsUpload($name, $type, $rooms, $beds){
        $sql = "SELECT * FROM hostels WHERE hostel_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        if($stmt -> rowCount() == 0){
            $sql1 = "INSERT INTO hostels (hostel_name, hostel_type, no_of_rooms, no_of_beds, is_full, date_added) VALUES (?, ?, ?, ?, '0', NOW())";
            $stmt1 = $this->connect()->prepare($sql1);
            $row = $stmt1->execute([$name, $type, $rooms, $beds]);
            
            $sql2 = "SELECT * FROM hostels WHERE hostel_name = ?";
            $stmt2 = $this->connect()->prepare($sql2);
            $stmt2->execute([$name]);
            $result = $stmt2->fetch();
            $hostelId = $result['hostel_id'];
            $hostelName = $result['hostel_name'];

            for ($i=1; $i<=$rooms; $i++) {
                $sql1 = "INSERT INTO rooms (hostel_id, hostel_name, room_no, is_full) VALUES (?, ?, ?, '0')";
                $stmt1 = $this->connect()->prepare($sql1);
                $stmt1->execute([$hostelId, $hostelName, $i]);

                for ($g=1; $g<=$beds ; $g++) {            
                    $sql1 = "INSERT INTO beds (hostel_id, hostel_name, room_no, bed_no, is_taken) VALUES (?, ?, ?, ?, '0')";
                    $stmt1 = $this->connect()->prepare($sql1);
                    $stmt1->execute([$hostelId, $hostelName, $i, $g]);
                }
            }
            if ($row) {
                return $msg = "Hostel added";
            }else{
                return $msg2 = "Can't upload";
            }

            }
            else{
                return $msg = "hostel already exists!";
            }

    }

    protected function viewHostels(){
        $sql = "SELECT * FROM hostels";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function viewHost($gender){
        $sql = "SELECT * FROM hostels WHERE hostel_type = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$gender]);
        return $stmt->fetchAll();
    }

    protected function hostelDelete($delete)
    {
        $sql = "DELETE FROM `hostels` WHERE `hostel_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$delete]);
        $sql1 = "DELETE FROM `rooms` WHERE `hostel_id` = ?";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$delete]);
        $sql2 = "DELETE FROM `beds` WHERE `hostel_id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        return $stmt2->execute([$delete]);
    }
//apply for hostel
protected function hostelApply($user_id, $username, $hostID, $room, $type){
    $sql1 = "SELECT * FROM `applications` WHERE `user_id` = ? AND `reg_number` = ? AND `status` = 'active'";
    $stmt1 = $this->connect()->prepare($sql1);
    $stmt1->execute([$user_id, $username]);

    if($stmt1 -> rowCount() == 0){
        $sql5 = "INSERT INTO `applications` (`user_id`, `reg_number`, `hostel_id`, `room_no`, `gender`, `date`, `status`) VALUES (?, ?, ?, ?, ?, NOW(), 'active')";
        $stmt5 = $this->connect()->prepare($sql5);
        $stmt5->execute([$user_id, $username, $hostID, $room, $type]);
        return true;

    }else{
        return false;
    }
}

protected function allocation(){
    $sql1 = "SELECT * FROM `applications` WHERE `status` = 'active' ORDER BY RAND()";
    $stmt1 = $this->connect()->query($sql1);
    $rw = $stmt1->fetchAll();
    foreach($rw as $row){
        $appID = $row['application_id'];
        $userID = $row['user_id'];
        $regNumber = $row['reg_number'];
        $hostelID = $row['hostel_id'];
        $roomNo = $row['room_no'];
        $gender = $row['gender'];
        
        $sql3 = "SELECT * FROM `allocations` WHERE `status` = 'active' AND `reg_number`=?";
        $stmt3 = $this->connect()->prepare($sql3);
        $stmt3->execute([$regNumber]);
        if($stmt3 -> rowCount() == 0){
        $app = $this->allocatesHostel($userID, $regNumber, $hostelID, $roomNo, $gender);

        if ($app) {
            $sql2 = "UPDATE `applications` SET `status` = 'inactive' WHERE `application_id` = ?";
            $stmt2 = $this->connect()->prepare($sql2);
            $stmt2->execute([$appID]);
        }
       }

    }
    return $msg = "Allocation done!";
    
}



//Allocate hostel
    protected function allocatesHostel($user_id, $username, $hostID, $room, $type)
    {
        
        $sql2 = "SELECT * FROM `hostels` WHERE `hostel_id` = ? AND `is_full` = '1'";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$hostID]);
        
        // checking if the hostel is full
        if($stmt2 -> rowCount() == 0){
            $sql3 = "SELECT * FROM `rooms` WHERE `hostel_id` = ? AND `room_no` = ? AND `is_full` = '1'";
            $stmt3 = $this->connect()->prepare($sql3);
            $stmt3->execute([$hostID, $room]);
            
            // checking if the room is full
            if($stmt3 -> rowCount() == 0){
                $sql4 = "SELECT * FROM beds WHERE bed_no = (SELECT MIN(bed_no) FROM beds WHERE is_taken = '0' AND room_no = ? AND hostel_id = ?) AND room_no = ? AND hostel_id = ?";
                $stmt4 = $this->connect()->prepare($sql4);
                $stmt4->execute([$room, $hostID, $room, $hostID]);
                $res4 = $stmt4->fetch();
                $bed_id = $res4['bed_id'];
                $bed_no = $res4['bed_no'];

                $sql5 = "INSERT INTO `allocations` (`user_id`, `reg_number`, `hostel_id`, `room_no`, `bed_no`, `date`, `status`) VALUES (?, ?, ?, ?, ?, NOW(), 'active')";
                $stmt5 = $this->connect()->prepare($sql5);
                $stmt5->execute([$user_id, $username, $hostID, $room, $bed_no]);

                $sql6 = "UPDATE `beds` SET `is_taken`= '1' WHERE `bed_id`= ?";
                $stmt6 = $this->connect()->prepare($sql6);
                $stmt6->execute([$bed_id]);
                
                return $this->isFull($room, $hostID);

            }else{
                $sql1 = "SELECT * FROM rooms WHERE room_no = (SELECT MIN(room_no) FROM rooms WHERE is_full = '0' AND hostel_id = ?) AND hostel_id = ?";
                $stmt1 = $this->connect()->prepare($sql1);
                $stmt1->execute([$hostID, $hostID]);
                $res1 = $stmt1->fetch();
                $room_no = $res1['room_no'];

                $sql2 = "SELECT * FROM beds WHERE bed_no = (SELECT MIN(bed_no) FROM beds WHERE is_taken = '0' AND room_no = ? AND hostel_id = ?) AND room_no = ? AND hostel_id = ?";
                $stmt2 = $this->connect()->prepare($sql2);
                $stmt2->execute([$room_no, $hostID, $room_no, $hostID]);
                $res2 = $stmt2->fetch();
                $bed_id = $res2['bed_id'];
                $bed_no = $res2['bed_no'];

                $sql3 = "INSERT INTO `allocations` (`user_id`, `reg_number`, `hostel_id`, `room_no`, `bed_no`, `date`, `status`) VALUES (?, ?, ?, ?, ?, NOW(), 'active')";
                $stmt3 = $this->connect()->prepare($sql3);
                $stmt3->execute([$user_id, $username, $hostID, $room_no, $bed_no]);

                $sql4 = "UPDATE `beds` SET `is_taken`= '1' WHERE `bed_id`= ?";
                $stmt4 = $this->connect()->prepare($sql4);
                $stmt4->execute([$bed_id]);
                
                return $this->isFull($room_no, $hostID);
            }

        }else{
            #if hostel is full
            $sql1 = "SELECT * FROM hostels WHERE hostel_id = (SELECT MIN(hostel_id) FROM hostels WHERE is_full = '0' AND hostel_type = ?)";
            $stmt1 = $this->connect()->prepare($sql1);
            $stmt1->execute([$type]);
            $res1 = $stmt1->fetch();
            $hostel_id = $res1['hostel_id'];

                $sql2 = "SELECT * FROM rooms WHERE room_no = (SELECT MIN(room_no) FROM rooms WHERE is_full = '0' AND hostel_id = ?) AND hostel_id = ?";
                $stmt2 = $this->connect()->prepare($sql2);
                $stmt2->execute([$hostel_id, $hostel_id]);
                $res2 = $stmt2->fetch();
                $room_no = $res2['room_no'];

                $sql3 = "SELECT * FROM beds WHERE bed_no = (SELECT MIN(bed_no) FROM beds WHERE is_taken = '0' AND room_no = ? AND hostel_id = ?) AND room_no = ? AND hostel_id = ?";
                $stmt3 = $this->connect()->prepare($sql3);
                $stmt3->execute([$room_no, $hostel_id, $room_no, $hostel_id]);
                $res3 = $stmt3->fetch();
                $bed_id = $res3['bed_id'];
                $bed_no = $res3['bed_no'];

                $sql4 = "INSERT INTO `allocations` (`user_id`, `reg_number`, `hostel_id`, `room_no`, `bed_no`, `date`, `status`) VALUES (?, ?, ?, ?, ?, NOW(), 'active')";
                $stmt4 = $this->connect()->prepare($sql4);
                $stmt4->execute([$user_id, $username, $hostel_id, $room_no, $bed_no]);

                $sql5 = "UPDATE `beds` SET `is_taken`= '1' WHERE `bed_id`= ?";
                $stmt5 = $this->connect()->prepare($sql5);
                $stmt5->execute([$bed_id]);
                
                return $this->isFull($room_no, $hostel_id);
        }

       
        
    }

    protected function isFull($room, $hostID)
    {
                    //Checking if rooms are free

                    $sql3 = "SELECT `is_taken` FROM `beds` WHERE `room_no`= ? AND `hostel_id` = ? AND `is_taken` = '0'";
                    $stmt3 = $this->connect()->prepare($sql3);
                    $stmt3->execute([$room, $hostID]);
    
                    if($stmt3 -> rowCount() == 0){
                    $sql4 = "UPDATE `rooms` SET `is_full`= '1' WHERE `room_no`= ? AND `hostel_id` = ?";
                    $stmt4 = $this->connect()->prepare($sql4);
                    $stmt4->execute([$room, $hostID]);
    
                    $sql5 = "SELECT `is_full` FROM `rooms` WHERE `hostel_id` = ? AND `is_full` = '0'";
                    $stmt5 = $this->connect()->prepare($sql5);
                    $stmt5->execute([$hostID]);
    
                    if($stmt5 -> rowCount() == 0){
                        $sql6 = "UPDATE `hostels` SET `is_full`= '1' WHERE `hostel_id` = ?";
                        $stmt6 = $this->connect()->prepare($sql6);
                        $stmt6->execute([$hostID]);
                    }
    
                    }
                    return true;
                    

    }

    protected function applicantView()
    {
        $sql = "SELECT * FROM applications INNER JOIN student_details ON student_details.user_id = applications.user_id INNER JOIN hostels ON hostels.hostel_id = applications.hostel_id WHERE applications.status = 'active'";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function allocationView()
    {
        $sql = "SELECT * FROM allocations INNER JOIN student_details ON student_details.user_id = allocations.user_id INNER JOIN hostels ON hostels.hostel_id = allocations.hostel_id WHERE allocations.status = 'active'";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function allocationReset()
    {
        $sql1 = "UPDATE `allocations` SET `status` = 'inactive'";
        $stmt1 = $this->connect()->query($sql1);

        $sql2 = "UPDATE `hostels` SET `is_full` = '0'";
        $stmt2 = $this->connect()->query($sql2);

        $sql3 = "UPDATE `rooms` SET `is_full` = '0'";
        $stmt3 = $this->connect()->query($sql3);

        $sql = "UPDATE `beds` SET `is_taken` = '0'";
        return $stmt = $this->connect()->query($sql);
    }

    protected function allocationDelete($var)
    {
        $sql = "SELECT * FROM `allocations` WHERE `allocation_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$var]);
        $row = $stmt->fetch();
        $hostelID = $row['hostel_id'];
        $room_no = $row['room_no'];
        $bed_no = $row['bed_no'];
        
        $sql2 = "UPDATE `hostels` SET `is_full` ='0' WHERE `hostel_id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$hostelID]);

        $sql3 = "UPDATE `rooms` SET `is_full` ='0' WHERE `hostel_id` = ? AND `room_no` = ?";
        $stmt3 = $this->connect()->prepare($sql3);
        $stmt3->execute([$hostelID, $room_no]);

        $sql4 = "UPDATE `beds` SET `is_taken` ='0' WHERE `hostel_id` = ? AND `room_no` = ? AND `bed_no` = ?";
        $stmt4 = $this->connect()->prepare($sql4);
        $stmt4->execute([$hostelID, $room_no, $bed_no]);

        $sql5 = "DELETE FROM `allocations` WHERE `allocation_id` = ?";
        $stmt5 = $this->connect()->prepare($sql5);
        $stmt5->execute([$var]);

    }

    protected function viewsAllocation($regNumber)
    {
        $sql = "SELECT * FROM allocations INNER JOIN hostels ON hostels.hostel_id = allocations.hostel_id WHERE allocations.status = 'active' AND allocations.reg_number = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$regNumber]);
        return $stmt->fetch();
    }
    protected function countsHostels()
    {
        $sql = "SELECT * FROM hostels";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }
    protected function countsGenderBased($gender)
    {
        $sql = "SELECT * FROM hostels WHERE hostel_type = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$gender]);
        return $stmt->rowCount();
    }
    protected function countsRooms()
    {
        $sql = "SELECT * FROM rooms";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }
    protected function countsBeds()
    {
        $sql = "SELECT * FROM beds";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }
    protected function countsAllocations()
    {
        $sql = "SELECT * FROM allocations WHERE `status`='active'";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }
    protected function countsGenderBasedAllo($gender)
    {
        $sql = "SELECT * FROM allocations INNER JOIN hostels ON hostels.hostel_id = allocations.hostel_id WHERE hostels.hostel_type = ? AND `status`='active'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$gender]);
        return $stmt->rowCount();
    }
   
}