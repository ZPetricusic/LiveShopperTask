<?php

abstract class TrainCar {

    ////////////////////////////////////
    //////      PROPERTIES      ////////
    ////////////////////////////////////

    protected float $weight;

    /////////////////////////////////////
    //////   GETTERS & SETTERS   ////////
    /////////////////////////////////////
    public function getWeight(){
        return $this->weight;
    }

    public function setWeight(float $weight){

        # if the car's weight does not meet the requirements
        if( !($this->isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # otherwise, set the new weight
        $this->weight = $weight;
    }

    public abstract function printCar();

    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////
    protected static function isValidWeight(float $weight){
        # returns true if the weight is a number larger than 0,
        # false otherwise
        return is_numeric($weight) && $weight > 0;
    }
}

?>