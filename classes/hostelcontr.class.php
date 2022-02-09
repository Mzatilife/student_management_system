<?php
class HostelContr extends Hostel{
    public function uploadHostels($name, $type, $rooms, $beds){
        return $this->hostelsUpload($name, $type, $rooms, $beds);
    }

    public function uploadCsv($csv){
        $csv = fopen($csv, 'r');
        while ($row = fgetcsv($csv)){
        $message = $this->hostelsUpload($row['0'], $row['1'], $row['2'], $row['3']);
        }
        return $message;
    }
    public function deleteHostel($hostelID)
    {
        return $this->hostelDelete($hostelID);
    }

    public function deleteAllocation($allocat_id)
    {
        return $this->allocationDelete($allocat_id);
    }

    public function makeAllocation()
    {
        return $this->allocation();
    }

    public function resetAllocation()
    {
        return $this->allocationReset();
    }
    public function allocate()
    {
        return $this->allocation();
    }
    
    public function applyHostel($user_id, $username, $hostID, $room, $gender)
    {
        return $this->hostelApply($user_id, $username, $hostID, $room, $gender);
    }
}