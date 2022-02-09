<?php
class Account extends Dbh{

    protected function uploadAccount($file){

        $file = fopen($file, 'r');
        while ($row = fgetcsv($file)){
         $result = $this->addsPaymentDetails($row['0'], $row['1'], $row['2'], $row['3'], $row['4']);
        }
        if ($result) {
            return $msg = "Fees details uploaded";
        }else{
            return $msg2 = "Fees details upload";
        }
    }
    protected function addsPaymentDetails($sname, $regno, $paid, $balance, $sem)
    {    
        $sql1 = "INSERT INTO account_archives (`name`, `number`, paid, sem, `date`) VALUES (?, ?, ?, ?, NOW())";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$sname, $regno, $paid, $sem]);

        $sql = "SELECT * FROM account_details WHERE reg_number = ? AND semester = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$regno, $sem]);
        $add = $stmt->fetch();

        if($stmt -> rowCount() == 0){
        $sql = "INSERT INTO account_details (student_name, reg_number, amount_paid, balance, semester, `date`) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$sname, $regno, $paid, $balance, $sem]);
        }
        else
        {
            $final = $add['amount_paid'] + $paid;
            $sql = "UPDATE account_details SET student_name = ?, amount_paid = ?, balance= ?, `date`= NOW() WHERE reg_number = ? AND semester = ?";
            $stmt = $this->connect()->prepare($sql);
            $result = $stmt->execute([$sname, $final, $balance, $regno, $sem]);
         }
         if ($result) {
            return true;
         }else{
             return false;
         }
    }

    protected function viewAccount(){
        $sql = "SELECT * FROM account_details";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function viewsAccount(){
        $sql = "SELECT DISTINCT reg_number, student_name FROM account_details";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function verifyFees($regnumber, $sem)
    {
        $sql = "SELECT * FROM account_details WHERE reg_number = ? AND semester = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$regnumber, $sem]);
        if($stmt -> rowCount() == 0)
        {
        return false;
        }
        else{
        $row = $stmt->fetch();
        $fees = $row['amount_paid'] + $row['balance'];

        if ($row['amount_paid'] < $fees) {     
        return false;
        }else{
        return true;
        }
    }
}

protected function viewBalance($regnumber, $sem)
{
    $sql = "SELECT * FROM account_details WHERE reg_number = ? AND semester = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$regnumber, $sem]);
    return $row = $stmt->fetch();
}

protected function viewsStudent($regnumber)
{
    $sql = "SELECT * FROM account_details WHERE reg_number = ? ORDER BY account_id DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$regnumber]);
    return $stmt->fetchAll();
}

protected function viewsArchives($regnumber, $sem)
{
    $sql = "SELECT * FROM `account_archives` WHERE `number` = ? AND `sem` = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$regnumber, $sem]);
    return $stmt->fetchAll();
}

protected function editsRecord($id, $paid, $balance)
{
    $sql = "UPDATE `account_details` SET `amount_paid` = ?, `balance` = ? WHERE `account_id` = ?";
    $stmt = $this->connect()->prepare($sql);
    $result = $stmt->execute([$paid, $balance, $id]);

    if ($result) {
    return "Record edited!";
    }else {
        return "Cannot edit record!";
    }
}

}