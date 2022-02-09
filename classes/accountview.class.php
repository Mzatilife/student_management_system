<?php
class AccountView extends Account{
    public function accountsView(){
        return $this->viewAccount();
    }
    public function vieAccount(){
        return $this->viewsAccount();
    }
    public function feesVerify($regnumber, $sem){
        return $this->verifyFees($regnumber, $sem);
    }
    public function balanceView($regnumber, $sem){
        return $this->viewBalance($regnumber, $sem);
    }
    public function viewStudent($regnumber){
        return $this->viewsStudent($regnumber);
    }
    public function viewArchives($regnumber, $sem){
        return $this->viewsArchives($regnumber, $sem);
    }
}
?>