<?php
class StandardizeView extends Standardize{
    public function checkRequest($crseID, $year, $sem)
    {
        return $this->checksRequest($crseID, $year, $sem);
    }
    public function viewRequest($code)
    {
        return $this->viewsRequest($code);
    }
    public function viewStandard($id)
    {
        return $this->viewsStandard($id);
    }
}

?>