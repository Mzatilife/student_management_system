<?php

class RegistrationContr extends Registration{
    public function getDetails($user_id, $fname, $lname, $regnum, $semester, $campus, $nationalid, $nationality, $gender, $DOB, $mailingad, $village, $ta, $district, $marital, $sname, $saddress, $sphone, $semail, $sdistrict, $sta, $gname, $goccupation, $gemail, $gmobile, $gmailing, $hq, $year){
        return $this->registerUser($user_id, $fname, $lname, $regnum, $semester, $campus, $nationalid, $nationality, $gender, $DOB, $mailingad, $village, $ta, $district, $marital, $sname, $saddress, $sphone, $semail, $sdistrict, $sta, $gname, $goccupation, $gemail, $gmobile, $gmailing, $hq, $year);
    }

    public function enrollToNextSem($username, $sem, $passrate)
    {
        return $this->enrollsToNextSem($username, $sem, $passrate);
    }
}


