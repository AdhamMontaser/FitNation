<?php
class DataStorage
{
    public $exerciseList = [];
    public $bodyPartsList = [];
    public $equipmentList = [];

    // Setter for exerciseList
    public function setExerciseList($exerciseList)
    {
        $this->exerciseList = $exerciseList;
    }

    // Getter for exerciseList
    public function getExerciseList()
    {
        return $this->exerciseList;
    }

    // Setter for bodyPartsList
    public function setBodyPartsList($bodyPartsList)
    {
        $this->bodyPartsList = $bodyPartsList;
    }

    // Getter for bodyPartsList
    public function getBodyPartsList()
    {
        return $this->bodyPartsList;
    }

    // Setter for equipmentList
    public function setEquipmentList($equipmentList)
    {
        $this->equipmentList = $equipmentList;
    }

    // Getter for equipmentList
    public function getEquipmentList()
    {
        return $this->equipmentList;
    }
}
