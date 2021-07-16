<?php

class TrainCar {

    # "enum" for the car types
    const CARGO = 1;
    const PASSENGER = 2;
    const ENGINE = 3;

    # PROPERTIES
    private $weight;
    private $type;

    # constructor for the weight and type
    function __construct($weight, $type)
    {
        # if the car's weight does not meet the requirements
        if( !($this->isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # if the car type does not match any constant
        if( !($this->isValidType($type)) )
            throw new Exception("Car type must be CARGO, PASSENGER or ENGINE");

        # otherwise, set the properties
        $this->weight = $weight;
        $this->type = $type;
    }

    /////////////////////////////////////
    //////   GETTERS & SETTERS   ////////
    /////////////////////////////////////
    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){

        # if the car's weight does not meet the requirements
        if( !($this->isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # otherwise, set the new weight
        $this->weight = $weight;

    }

    public function getCarType(){
        return $this->type;
    }

    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////
    private function isValidWeight($weight){
        # returns true if the weight is a number larger than 0,
        # false otherwise
        return is_numeric($weight) && $weight > 0;
    }

    private function isValidType($type){
        # returns true if the car type is one of the available options and is an integer
        # false otherwise
        return $type === TrainCar::CARGO ||
               $type === TrainCar::PASSENGER ||
               $type === TrainCar::ENGINE;
    }
}

?>