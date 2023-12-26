<?php
class Food
{
    public $id;
    public $name;
    public $caloric;
    public $fat;
    public $carbon;
    public $protein;

    public function __construct($id, $name, $caloric, $fat, $carbon, $protein)
    {
        $this->id = $id;
        $this->name = $name;
        $this->caloric = $caloric;
        $this->fat = $fat;
        $this->carbon = $carbon;
        $this->protein = $protein;
    }
}
