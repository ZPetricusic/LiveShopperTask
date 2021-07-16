<?php

require_once "TrainCar.php";

class EngineCar extends TrainCar{

    ////////////////////////////////////
    //////      PROPERTIES      ////////
    ////////////////////////////////////

    # not required, added to distinct the car types

    private int $engineType;

    function __construct($weight, $engineType)
    {
        # if the weight is not properly assigned
        if( !(parent::isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # if the engine type is not properly assigned
        if( !($this->isCorrectEngineType($engineType)) )
            throw new Exception("Car weight must be a positive number!");

        # otherwise, set the properties
        $this->weight = $weight;
        $this->engineType = $engineType;
    }



    /////////////////////////////////
    //////      METHODS      ////////
    /////////////////////////////////
    public function printCar(){

        $engineNames = [
            EngineType::DIESEL => "Diesel",
            EngineType::ELECTRIC => "Electric",
            EngineType::STEAM => "Steam",
        ];

        echo "[".$engineNames[$this->engineType]." engine<sub>".$this->weight."kg</sub>]";
    }

    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////
    private function isCorrectEngineType($engineType){
        return $engineType === EngineType::DIESEL ||
               $engineType === EngineType::STEAM ||
               $engineType === EngineType::ELECTRIC
        ;
    }
}

?>