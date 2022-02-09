<?php
class StandardizeContr extends Standardize{
    public function uploadRequest($crseID, $code, $year, $sem)
    {
        return $this->uploadsRequest($crseID, $code, $year, $sem);
    }
}

?>