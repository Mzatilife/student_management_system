<?php
class ManageCoursesContr extends ManageCourses{

    public function addCsv($csv, $pg){
        return $this->uploadCourses($csv, $pg);
    }
    public function addCourse($code, $name, $sem, $pg){
        return $this->addsCourse($code, $name, $sem, $pg);
    }
    public function editCourse($id, $name, $code, $sem){
        return $this->editsCourse($id, $name, $code, $sem);
    }
    public function lecturerSet($course, $lec){
        return $this->setLecturer($course, $lec);
    }
    public function deleteCourse($id)
    {
        return $this->deletesCourse($id);
    }
}

?>