<?php
class ResultContr extends Result{
    public function uploadResults($userID, $type, $csv){
        return $this->insertResults($userID, $type, $csv);
    }
    public function approveGrades()
    {
      return $this->approvesGrades();
    }
    public function uploadGrading($distinction, $credit, $pass, $supp, $repeat, $pg)
    {
      return $this->uploadsGrading($distinction, $credit, $pass, $supp, $repeat, $pg);
    }
    public function editGrading($distinction, $credit, $pass, $supp, $repeat, $pg)
    {
      return $this->editsGrading($distinction, $credit, $pass, $supp, $repeat, $pg);
    }
    public function standardiseGrades($courseID, $sem, $year, $ds, $cdt, $ps, $sup, $rep, $pg)
    {
      return $this->standardisesGrade($courseID, $sem, $year, $ds, $cdt, $ps, $sup, $rep, $pg);
    }
    public function addMarks($courseID, $semester, $year, $program)
    {
      return $this->addsMarks($courseID, $semester, $year, $program);
    }
}