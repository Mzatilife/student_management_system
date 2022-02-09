<?php
class AccountContr extends Account{
    public function addCsv($csv){
        return $this->uploadAccount($csv);
    }
    public function addPaymentDetails($sname, $regno, $paid, $balance, $sem){
        $result = $this->addsPaymentDetails($sname, $regno, $paid, $balance, $sem);
        if ($result) {
            return $msg = "Fees details uploaded";
        }else{
            return $msg2 = "Fees details upload";
        }
    }

    public function editRecord($id, $paid, $balance)
    {
        return $this->editsRecord($id, $paid, $balance);
    }
}