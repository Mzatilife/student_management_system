<?php
class ManageCourses extends Dbh{

    protected function uploadCourses($file, $pg){

        $file = fopen($file, 'r');
        while ($row = fgetcsv($file)){
        $sql = "INSERT INTO course_details (course_code, course_name, semester, program) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$row['0'], $row['1'], $row['2'], $pg]);
        }
        if ($result) {
            return $msg = "Courses uploaded";
        }else{
            return $msg2 = "Couldn't upload";
        }
    }
    
    protected function addsCourse($code, $name, $sem, $pg){
        $sql = "INSERT INTO course_details (course_code, course_name, semester, program) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$code, $name, $sem, $pg]);
    
        if ($result) {
            return $msg = "Courses uploaded";
        }else{
            return $msg2 = "Couldn't upload";
        }
    }

    protected function viewCourses($to, $from, $pg){
        $sql = "SELECT * FROM course_details WHERE program = ? AND semester BETWEEN ? AND ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pg, $to, $from]);
        return $stmt->fetchAll();
    }

    protected function editsCourse($id, $name, $code, $sem){
        $sql = "UPDATE course_details SET `course_name`=?, `course_code`=?, `semester`=? WHERE course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name, $code, $sem, $id]);

        if ($result) {
            return "course edited!";
        }else{
            return "couldn't edit course!";
        }
    }

    protected function viewCount($table, $pg){
        $sql = "SELECT * FROM ? WHERE program = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$table, $pg]);
        return $stmt -> rowCount();
    }
    protected function setLecturer($course, $lec){
        $sql = "UPDATE course_details SET `user_id` = ? WHERE course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$lec, $course]);
    }
    protected function viewLecturerCourses($userID){
        $sql = "SELECT * FROM `course_details` WHERE `user_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID]);
        return $stmt->fetchAll();
    }
    protected function viewsCourse($course_id){
        $sql = "SELECT * FROM course_details WHERE course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course_id]);
        return $stmt->fetch();
    }
    protected function deletesCourse($id){
        $sql = "DELETE FROM course_details WHERE course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$id]);
    }


}