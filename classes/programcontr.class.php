<?php
class ProgramContr extends Program{
    public function addFaculty($name){
        return $this->addsFaculty($name);
    }

    public function editFaculty($id, $name){
        return $this->editsFaculty($id, $name);
    }

    public function addProgram($fID, $pgname, $pgcode){
        return $this->addsProgram($fID, $pgname, $pgcode);
    }

    public function editProgram($id, $name, $code, $faculty){
        return $this->editsProgram($id, $name, $code, $faculty);
    }

    public function deleteProgram($delID){
        return $this->deletesProgram($delID);
    }
    public function deleteFaculty($delID){
        return $this->deletesFaculty($delID);
    }

}

?>