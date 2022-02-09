<?php
class ResultView extends Result{
    public function resultsView($user_id)
    {
        return $this->viewResult($user_id);
    }
    public function selectDistinct($pg, $st)
    {
        return $this->selectsDistinct($pg, $st);
    }
    
    public function viewStudent($sem, $regNumber, $type)
    {
        return $this->studentView($sem, $regNumber, $type);
    }

    public function viewSemester($regNumber)
    {
        return $this->semesterView($regNumber);
    }
    
    public function averageResult($sem, $regNumber, $type)
    {
        return $this->resultAverage($sem, $regNumber, $type);
    }

    public function viewOverall($sem, $regNumber, $type, $passrate, $repeat)
    {
        return $this->overrallView($sem, $regNumber, $type, $passrate, $repeat);
    }

    public function viewRepeat($sem, $regNumber, $type, $passrate)
    {
        return $this->viewsRepeat($sem, $regNumber, $type, $passrate);
    }

    public function analyseResult($course_id, $semster, $year, $st, $first, $second)
    {
        return $this->analysesResult($course_id, $semster, $year, $st, $first, $second);
    }

    public function analyseResult2($course_id, $semster, $year, $first, $second)
    {
        return $this->analysesResult2($course_id, $semster, $year, $first, $second);
    }

    public function countStudents($course_id, $semster, $year, $st)
    {
        return $this->countsStudents($course_id, $semster, $year, $st);
    }

    public function countStudents2($course_id, $semster, $year)
    {
        return $this->countsStudents2($course_id, $semster, $year);
    }

    public function viewToStandardize($course_id, $semester, $year, $st)
    {
        return $this->viewsToStandardize($course_id, $semester, $year, $st);
    }

    public function viewForLecturer($course_id, $semester, $year)
    {
        return $this->viewsForLecturer($course_id, $semester, $year);
    }
    
    public function viewGrading($pg)
    {
        return $this->viewsGrading($pg);
    }

    public function viewStandard($course_id, $semester, $year)
    {
        return $this->viewsStandard($course_id, $semester, $year);
    }

}

?>