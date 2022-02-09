<?php
class HostelView extends Hostel{

    public function veiwHostel()
    {
    return $this->viewHostels();
    }

    public function hostelViews($gender)
    {
    return $this->viewHost($gender);
    }

    public function viewApplicants()
    {
    return $this->applicantView();
    }
    public function viewAllocation()
    {
    return $this->allocationView();
    }
    public function viewAllocations($reg)
    {
    return $this->viewsAllocation($reg);
    }

    public function countHostels()
    {
    return $this->countsHostels();
    }
    public function countGenderBased($gen)
    {
    return $this->countsGenderBased($gen);
    }
    public function countRooms()
    {
    return $this->countsRooms();
    }
    public function countBeds()
    {
    return $this->countsBeds();
    }
    public function countallocation()
    {
    return $this->countsAllocations();
    }
    public function countGenderBasedAllo($gen)
    {
    return $this->countsGenderBasedAllo($gen);
    }
}

?>