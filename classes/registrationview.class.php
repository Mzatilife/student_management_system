<?php
class RegistrationView extends Registration{
    public function registrationResult($type){
        return $this->viewStudent($type);
    }
    public function viewSemester($type){
        return $this->semesterView($type);
    }

    public function vieStudent($id){
        return $this->viewsStudent($id);
    }
    public function viewSingleStudent($var)
    {
        return $this->viewsSingleStudent($var);
    }
} 