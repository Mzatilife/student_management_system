<?php
 class Program extends Dbh{
     protected function addsFaculty($fname){
        $sql = "INSERT INTO faculties (faculty_name) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$fname]);
        
        if ($result) {
            return $msg = "Faculty uploaded";
        }else{
            return $msg2 = "Cannot upload faculty";
        }
     }

     protected function addsProgram($fID, $pgname, $pgcode){
        $sql = "INSERT INTO programs (faculty_id, program_name, program_code) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$fID, $pgname, $pgcode]);
        
        if ($result) {
            return $msg = "Program uploaded";
        }else{
            return $msg2 = "Cannot upload program";
        }
     }

     protected function editsProgram($id, $name, $code, $faculty){
      $sql = "UPDATE programs SET faculty_id=?, program_name=?, program_code=? WHERE program_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $result = $stmt->execute([$faculty, $name, $code, $id]);
      
      if ($result) {
          return $msg = "Program edited";
      }else{
          return $msg2 = "Cannot edit program";
      }
   }

   protected function editsFaculty($id, $name){
      $sql = "UPDATE faculties SET faculty_name=? WHERE faculty_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $result = $stmt->execute([$name, $id]);
      
      if ($result) {
          return $msg = "Faculty edited";
      }else{
          return $msg2 = "Cannot edit faculty";
      }
   }

     protected function viewsFaculties(){
        $sql = "SELECT * FROM faculties";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
     }

     protected function viewsPrograms(){
        $sql = "SELECT * FROM programs INNER JOIN faculties ON programs.faculty_id = faculties.faculty_id";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
     }

   protected function viewsProgram($fID){
      $sql = "SELECT * FROM programs WHERE faculty_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$fID]);
      return $stmt->fetchAll();
   }

     protected function countsPrograms($fID){
        $sql = "SELECT * FROM programs WHERE faculty_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fID]);
        return $stmt -> rowCount();
     }
     protected function deletesProgram($pgID){
        $sql = "DELETE FROM `programs` WHERE `program_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$pgID]);
      }
      protected function deletesFaculty($fID){
        $sql = "DELETE FROM `faculties` WHERE `faculty_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fID]);

        $sql1 = "DELETE FROM `programs` WHERE `faculty_id` = ?";
        $stmt1 = $this->connect()->prepare($sql1);
        return $stmt1->execute([$fID]);
      }
      protected function countsFaculties(){
         $sql = "SELECT * FROM faculties";
         $stmt = $this->connect()->query($sql);
         return $stmt->rowCount();
      }
      protected function countsProgram(){
         $sql = "SELECT * FROM programs";
         $stmt = $this->connect()->query($sql);
         return $stmt->rowCount();
      }
 }


?>