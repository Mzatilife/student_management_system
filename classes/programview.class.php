<?php
class ProgramView extends Program{
    public function viewFaculties()
    {
        return $this->viewsFaculties();
    }

    public function viewPrograms()
    {
        return $this->viewsPrograms();
    }

    public function viewProgram($fID)
    {
        return $this->viewsProgram($fID);
    }

    public function countPrograms($fID)
    {
        return $this->countsPrograms($fID);
    }
    public function countProgram()
    {
        return $this->countsProgram();
    }
    public function countFaculties()
    {
        return $this->countsFaculties();
    }
}


?>