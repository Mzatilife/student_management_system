<?php

class Result extends Dbh{
    protected function insertResults($userID, $type, $file){
        $file = fopen($file, 'r');
    
        while ($row = fgetcsv($file)){ 
            $sql = "SELECT * FROM `course_details` WHERE `course_code` = ?";
            $stm = $this->connect()->prepare($sql);
            $stm->execute([$row['1']]);
            $res = $stm->fetch();
            $course_id = $res['course_id'];

        // adding to the archives folder
        $sql3 = "INSERT INTO `result_archives` (`user_id`, `course_id`, `reg_number`, `course_code`, `exam_type`, `grade`, `semester`, `year`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt3 = $this->connect()->prepare($sql3);
        $stmt3->execute([$userID, $course_id, $row['2'], $row['1'], $type, $row['3'], $row['4'], $row['5']]);

        $sql1 = "SELECT * FROM `result_details` WHERE `reg_number` = ? AND `course_code` = ? AND `year`= ? AND `status`='0'";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$row['2'], $row['1'], $row['5']]);
        $rw = $stmt1->fetch();
        $grade = $rw['grade'] + $row['3'];

        if($stmt1->rowCount() == 0){
        $sql2 = "INSERT INTO `result_details` (`user_id`, `course_id`, `reg_number`, `course_code`,`exam_type`, `grade`, `semester`, `year`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '0')";
        $stmt2 = $this->connect()->prepare($sql2);
        $result = $stmt2->execute([$userID, $course_id, $row['2'], $row['1'], $type, $row['3'], $row['4'], $row['5']]);
        }
        else{
                $sql4 = "UPDATE `result_details` SET `grade` = ?, `exam_type` = ? WHERE `reg_number` = ? AND `course_code` = ? AND `year` = ? AND `status`='0'";
                $stmt4 = $this->connect()->prepare($sql4);
                $result = $stmt4->execute([$grade, $type, $row['2'], $row['1'], $row['5']]);  
        }
    }
        if ($result) {
            return $msg = "Results uploaded";
        }else{
            return $msg2 = "Couldn't upload";
        }
    }

    protected function viewResult($user_id)
    {
        $sql = "SELECT DISTINCT result_details.course_id, result_details.semester, result_details.year FROM `result_details` INNER JOIN `course_details` ON result_details.course_id = course_details.course_id WHERE result_details.user_id = ? AND result_details.exam_type = 'end'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    protected function studentView($sem, $reg_number, $type)
    {
        $sql = "SELECT * FROM result_details INNER JOIN course_details ON result_details.course_id = course_details.course_id WHERE result_details.reg_number = ? AND result_details.semester = ? AND result_details.exam_type = ? AND result_details.status = '1'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reg_number, $sem, $type]);
        return $stmt->fetchAll();
    }

    protected function resultAverage($sem, $reg_number, $type)
    {
        $sql = "SELECT AVG(grade) FROM `result_details` WHERE `reg_number` = ? AND `semester` = ? AND `exam_type` = ? AND `status`= '1'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reg_number, $sem, $type]);
        return $stmt->fetch();
    }
    protected function overrallView($sem, $reg_number, $type, $passrate, $repeat)
    {
        $sql = "SELECT * FROM `result_details` WHERE `reg_number` = ? AND `semester` = ? AND `exam_type` = ? AND (`grade` BETWEEN  ? AND ?) AND `status`= '1'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reg_number, $sem, $type, $repeat, $passrate]);
        return $stmt -> rowCount();
    }

    protected function viewsRepeat($sem, $reg_number, $type, $repeatrate)
    {
        $sql = "SELECT * FROM `result_details` WHERE `reg_number` = ? AND `semester` = ? AND `exam_type` = ? AND `grade` < ? AND `status`= '1'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reg_number, $sem, $type, $repeatrate]);
        return $stmt -> rowCount();
    }

    protected function semesterView($reg_number)
    {
        $sql = "SELECT DISTINCT(semester) FROM `result_details` WHERE `reg_number` = ? AND `status`= '1' ORDER BY `semester` DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reg_number]);
        return $stmt->fetchAll();
    }

    protected function selectsDistinct($pg, $st)
    {
        $sql = "SELECT DISTINCT result_details.course_id, result_details.semester, result_details.year FROM `result_details` INNER JOIN `course_details` ON result_details.course_id = course_details.course_id WHERE course_details.program = ? AND `status`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pg, $st]);
        return $stmt->fetchAll();
    }

    protected function analysesResult($course_id, $semster, $year, $st, $first, $second)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id`=? AND `semester`=? AND `year`=? AND `exam_type`= 'end' AND `status`=?  AND `grade` BETWEEN ? AND ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course_id, $semster, $year, $st, $first, $second]);
        return $stmt->rowCount();
    }

    protected function analysesResult2($course_id, $semster, $year, $first, $second)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id`=? AND `semester`=? AND `year`=? AND `exam_type`= 'end' AND `grade` BETWEEN ? AND ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course_id, $semster, $year, $first, $second]);
        return $stmt->rowCount();
    }

    protected function countsStudents($course_id, $semster, $year, $st)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id`=? AND `semester`=? AND `year`=? AND `exam_type`= 'end' AND `status`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course_id, $semster, $year, $st]);
        return $stmt->rowCount();
    }

    protected function countsStudents2($course_id, $semster, $year)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id`=? AND `semester`=? AND `year`=? AND `exam_type`= 'end'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course_id, $semster, $year]);
        return $stmt->rowCount();
    }

    protected function approvesGrades()
    {
        $sql = "UPDATE `result_details` SET `status`= '1' WHERE `status` = '0'";
        $stmt =  $this->connect()->query($sql);

        $sql2 = "UPDATE `std_requests` SET `status`= '1' WHERE `status` = '0'";
        $stmt2 =  $this->connect()->query($sql2);

        if ($stmt && $stmt2) {
            return $msg = "Grades approved!";
        }else{
            return $msg = "Grades not approved!";
        }
    }

    protected function viewsToStandardize($courseID, $sem, $year, $st)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id` = ? AND `semester` = ? AND `year` = ? AND `exam_type`='end' AND `status`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$courseID, $sem, $year, $st]);
        return $stmt->fetchAll();
    }

    protected function viewsForLecturer($courseID, $sem, $year)
    {
        $sql = "SELECT * FROM `result_details` WHERE `course_id` = ? AND `semester` = ? AND `year` = ? AND `exam_type`='end'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$courseID, $sem, $year]);
        return $stmt->fetchAll();
    }

    protected function viewsStandard($courseID, $sem, $year)
    {
        $sql = "SELECT * FROM `standards` WHERE `course_id` = ? AND `semester` = ? AND `year` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$courseID, $sem, $year]);
        return $stmt->fetch();
    }

    protected function uploadsGrading($distinction, $credit, $pass, $supp, $repeat, $pg)
    {
        $sql = "SELECT * FROM `grading` WHERE `program`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pg]);
        if ($stmt -> rowCount() == 0) {
            $sql2 = "INSERT INTO `grading` (`distinction`, `credit`, `pass`, `supplementary`,`repeat_course`, `program`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt2 = $this->connect()->prepare($sql2);
            $result = $stmt2->execute([$distinction, $credit, $pass, $supp, $repeat, $pg]);
            if ($result) {
             return $msg="Grading uploaded";
            }else{
                return $msg = "Could not upload!";
            }
        }else{
            return $msg = "Already exists, Please Just edit!";
        }
    }

    protected function editsGrading($distinction, $credit, $pass, $supp, $repeat, $pg)
    {
        $sql = "UPDATE `grading` SET `distinction` = ?, `credit`=?, `pass`=?, `supplementary`=?, `repeat_course`=? WHERE `program`=?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$distinction, $credit, $pass, $supp, $repeat, $pg]);
        if ($result) {
         return $msg="Grading Edited";
        }else{
            return $msg = "Could not edit!";
        }
    }

    protected function viewsGrading($pg)
    {
        $sql = "SELECT * FROM `grading` WHERE `program`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pg]);
        return $stmt->fetch();
    }

    protected function standardDeviation($my_arr, $no_element, $avg)
    {
    $var = 0.0;
    foreach ($my_arr as $i) {
    $var += pow(($i['grade'] - $avg), 2);
    }
    return (float)sqrt($var/$no_element);
    }

    protected function standardisesGrade($courseID, $sem, $year, $ds, $cdt, $ps, $sup, $rep, $pg)
    {
        $sql = "SELECT `grade` FROM `result_details` WHERE `course_id` = ? AND `semester` = ? AND `year` = ? AND `exam_type`='end'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$courseID, $sem, $year]);
        $grades = $stmt->fetchAll();
        $noElement = count($grades);


        $sql3 = "SELECT sum(grade) AS gradeSum FROM `result_details` WHERE `course_id` = ? AND `semester` = ? AND `year` = ? AND `exam_type`='end'";
        $stmt3 = $this->connect()->prepare($sql3);
        $stmt3->execute([$courseID, $sem, $year]);
        $sum = $stmt3->fetch();
        $avg = $sum['gradeSum']/$noElement;

        $std = $this->standardDeviation($grades, $noElement, $avg);
        
        $distinction = ($std * ($ds)) + $avg;
        $credit = ($std * ($cdt)) + $avg;
        $pass = ($std * ($ps)) + $avg;
        $supp = ($std * ($sup)) + $avg;
        $repea = ($std * ($rep)) + $avg;

        $sql1 = "SELECT * FROM `standards` WHERE `course_id`=? AND `year`=? AND `semester`=?";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$courseID, $year, $sem]);
        if ($stmt1 -> rowCount() == 0) {
            $sql2 = "INSERT INTO `standards` (`distinction`, `credit`, `pass`, `supplementary`,`repeat_course`, `course_id`, `semester`, `year`, `program`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '0')";
            $stmt2 = $this->connect()->prepare($sql2);
            $result = $stmt2->execute([$distinction, $credit, $pass, $supp, $repea, $courseID, $sem, $year, $pg]);
            if ($result) {
             return $msg="Calculations made!";
            }else{
                return $msg = "Could not do the calculation!";
            }
        }else{
            return $msg = "You already made the calculations!";
        }


    }

    protected function addsMarks($courseID, $semester, $year, $program)
    {
        $sql = "SELECT * FROM `grading` WHERE `program`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$program]);
        $gd = $stmt->fetch();

        $sql1 = "SELECT * FROM `standards` WHERE `course_id`=? AND `semester`=? AND `year`=?";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$courseID, $semester, $year]);
        $gd1 = $stmt1->fetch();
        
        $std_id = $gd1['standard_id'];

        $dist = $gd['distinction'] - $gd1['distinction'];
        $crdt = $gd['credit'] - $gd1['credit'];
        $pss = $gd['pass'] - $gd1['pass'];
        $sp = $gd['supplementary'] - $gd1['supplementary'];
        $rp = $gd['repeat_course'] - ($gd1['repeat_course']);


        $sql2 = "SELECT * FROM `result_details` WHERE `course_id`=? AND `semester`=? AND `year`=?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$courseID, $semester, $year]);
        $gd2 = $stmt2->fetchAll();

        foreach ($gd2 as $key) {
            $keyId = $key['result_id'];
            if ($gd1['supplementary'] > $key['grade'] && $key['grade'] >= $gd1['repeat_course']) {
                $fnal = $key['grade'] + $rp;
            }elseif($gd1['pass'] > $key['grade'] && $key['grade'] >= $gd1['supplementary']) {
                $fnal = $key['grade'] + $sp;
            }elseif($gd1['credit'] > $key['grade'] && $key['grade'] >= $gd1['pass']) {
                $fnal = $key['grade'] + $pss;
            }elseif($gd1['distinction'] > $key['grade'] && $key['grade'] >= $gd1['credit']) {
                $fnal = $key['grade'] + $crdt;
            }elseif($key['grade'] >= $gd1['distinction']) {
                $nal = $key['grade'] + $dist;

                if ($nal > 100) {
                 $fnal = 100;
                }else{
                $fnal = $nal;
                }
            }
            
            $sql3 = "UPDATE `result_details` SET `grade`=? WHERE `result_id`=?";
            $stmt3 = $this->connect()->prepare($sql3);
            $result = $stmt3->execute([$fnal, $keyId ]);
        }
        if ($result) {

            $sql4 = "UPDATE `standards` SET `status`= '1' WHERE `standard_id`=?";
            $stmt4 = $this->connect()->prepare($sql4);
            $stmt4->execute([$std_id]);

            return $msg = "Grades have been standardised!"; 
            }else{
            return $msg = "Grades have not been standardised!";  
            }

    }
    
}