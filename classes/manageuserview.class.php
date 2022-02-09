<?php
class ManageUserView extends ManageUser{
    
    public function userNumber(string $type){
        return $this->viewUser($type);
    }
    public function specificView(string $type){
        return $this->viewSpecific($type);
    }
    public function userList(){
        return $this->listUser();
    }
    public function studentView($pg, $to, $from){
        return $this->viewStudent($pg, $to, $from);
    }
    public function lecturerView($type, $pg){
        return $this->viewLecturer($type, $pg);
    }
    public function userById($id){
        return $this->viewUserById($id);
    }

    public function viewStudents($to, $from){
        return $this->viewsStudent($to, $from);
    }
    public function countUsers($type, $pg){
        return $this->countsUsers($type, $pg);
    }
    public function countStudents($pg){
        return $this->countsStudents($pg);
    }
    public function checkUser($username, $email)
    {
        return $this->checksUser($username, $email);
    }
}
?>