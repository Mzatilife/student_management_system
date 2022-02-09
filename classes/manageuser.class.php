<?php
class ManageUser extends Dbh{
    
    protected function registerUser($userType, $name, $pg, $em, $usern, $pwdcode){
        $sql = "INSERT INTO user_details (`user_type`, `program`, `email`, `real_name`, `username`,`password`, `reg_date`, `status`) VALUES (?, ?, ?, ?, ?, ?, NOW(), 'active')";
        $stmt = $this->connect()->prepare($sql);
        $pwd = password_hash($pwdcode, PASSWORD_DEFAULT);
        
        if($stmt->execute([$userType, $pg, $em, $name, $usern, $pwd]))
        {
         return $msg = "user added";
      }
    }
    protected function loginUser($usrnm, $password){
        $sql = "SELECT * FROM `user_details` WHERE `username` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$usrnm]);
        $row = $stmt->fetch();
  
        if($stmt -> rowCount() > 0){
          if ($row['status'] == 'active') {
            if ($usrnm == $row['username']) {
              if (password_verify($password, $row['password'])) {
                      session_start();
                      $_SESSION['user_login'] = $row['user_id'];
                      $_SESSION['username'] = $row['username'];
                      $_SESSION['real_name'] = $row['real_name'];
                      $_SESSION['program'] = $row['program'];
                      $user_type = $row['user_type'];
                      return header("location: $user_type/dashboard.php");
                      
              }else{
                  return $errorMsg[] = "incorrect password";
              }
            }else{
              return $errorMsg[] = "incorrect username";
          }
        }else{
          return $errorMsg[] = "Your account is deactivated";
        }
        }
        else{
          return $errorMsg[] = "incorrect username or password";
          }
        }
  
  protected function changesPassword($oldPass, $newPass, $confPass, $user_id)
  {
    $sql = "SELECT * FROM `user_details` WHERE `user_id` = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id]);
    $row = $stmt->fetch();

    if($stmt -> rowCount() > 0){
      if (password_verify($oldPass, $row['password'])) {
        if ($newPass == $confPass) {
          $pwd = password_hash($newPass, PASSWORD_DEFAULT);

          $sql2 = "UPDATE `user_details` SET `password`=? WHERE `user_id` = ?";
          $stmt2 = $this->connect()->prepare($sql2);
          $result = $stmt2->execute([$pwd, $user_id]);

          if ($result) {
            return $errorMsg[] = "Password changed!";  
          }else{
            return $errorMsg[] = "Password did not change!"; 
          }

        }else{
          return $errorMsg[] = "The two passwords did not match!";  
        }
      }else{
       return $errorMsg[] = "incorrect password";
      }
    }
  }

  protected function viewUser($type1){
            $sql = "SELECT * FROM user_details WHERE user_type = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$type1]);
            return $stmt -> rowCount();
        }
  protected function viewSpecific($type1){
          $sql = "SELECT * FROM user_details WHERE user_type = ?";
          $stmt = $this->connect()->prepare($sql);
          $stmt->execute([$type1]);
          return $stmt -> fetchAll();
      }
    protected function listUser(){
        $sql = "SELECT * FROM user_details WHERE user_type != 'admin'";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }
    protected function viewStudent($pg, $to, $from){
      $sql = "SELECT * FROM student_details INNER JOIN user_details ON user_details.user_id = student_details.user_id WHERE user_details.program = ? AND (student_details.semester BETWEEN ? AND ?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$pg, $to, $from]);
      return $stmt->fetchAll();
  }
  protected function viewsStudent($to, $from){
    $sql = "SELECT * FROM student_details INNER JOIN user_details ON user_details.user_id = student_details.user_id WHERE student_details.semester BETWEEN ? AND ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$to, $from]);
    return $stmt->fetchAll();
}
  protected function viewLecturer($type, $pg){
    $sql = "SELECT * FROM user_details WHERE user_type = ? AND program = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$type, $pg]);
    return $stmt->fetchAll();
}
protected function viewUserById($id){
  $sql = "SELECT * FROM user_details WHERE `user_id` = ?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$id]);
  return $stmt->fetch();
}
protected function userDeactivate($userID, $sts){
  $sql = "UPDATE `user_details` SET `status` = ? WHERE `user_id` = ?";
  $stmt = $this->connect()->prepare($sql);
  return $stmt->execute([$sts, $userID]);
}
protected function userDelete($userID){
  $sql = "DELETE FROM `user_details` WHERE `user_id` = ?";
  $stmt = $this->connect()->prepare($sql);
  return $stmt->execute([$userID]);
}
protected function countsUsers($type1, $pg){
  $sql = "SELECT * FROM `user_details` WHERE `user_type` = ? AND `program`=?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$type1, $pg]);
  return $stmt -> rowCount();
}
protected function countsStudents($pg){
  $sql = "SELECT * FROM `student_details` INNER JOIN `user_details` ON student_details.user_id = user_details.user_id WHERE user_details.program=?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$pg]);
  return $stmt -> rowCount();
}
protected function checksUser($username, $email){
  $sql = "SELECT * FROM `user_details` WHERE `username`=? and `email`=?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$username, $email]);
  $result = $stmt -> rowCount();

  if ($result > 0) {
    return true;
  }else{
    return false;
  }
}

protected function resetsPassword($username, $password){
  $pwd = password_hash($password, PASSWORD_DEFAULT);
  $sql = "UPDATE `user_details` SET `password`=? WHERE `username`=?";
  $stmt = $this->connect()->prepare($sql);
  $result = $stmt->execute([$pwd, $username]);

  if ($result > 0) {
    return true;
  }else{
    return false;
  }
}
}
?>