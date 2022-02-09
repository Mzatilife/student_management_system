<?php
class ManageCoursesView extends ManageCourses{
    
    public function coursesView($to, $from, $pg){
        return $this->viewCourses($to, $from, $pg);
    }
    public function coursesCount($table, $pg){
        return $this->viewCount($table, $pg);
    }
    public function lecturerCourses($userID){
        return $this->viewLecturerCourses($userID);
    }
    public function viewCourse($course_id){
        return $this->viewsCourse($course_id);
    }
    
}
?>