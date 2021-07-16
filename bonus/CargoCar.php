<?php

require_once "TrainCar.php";

class CargoCar extends TrainCar{

    ////////////////////////////////////
    //////      PROPERTIES      ////////
    ////////////////////////////////////

    # not required, added to distinct the car types
    const MAX_LOAD_KG = 50000;

    private float $cargoLoad;

    function __construct($weight, $cargoLoad)
    {
        # if the weight is not properly assigned
        if( !(parent::isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # check for invalid load weight
        if( !($this->isLoadWeightValid($cargoLoad)) )
            throw new Exception("Cargo weight must be in range <0, ".self::MAX_LOAD_KG."].");

        # otherwise, set the properties
        $this->weight = $weight;
        $this->cargoLoad = $cargoLoad;
    }



    /////////////////////////////////
    //////      METHODS      ////////
    /////////////////////////////////
    public function printCar(){
        echo "[".$this->cargoLoad."kg<sub>".$this->weight."kg</sub>]";
    }

    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////
    private function isLoadWeightValid($loadWeight){
        return is_numeric($loadWeight) && $loadWeight <= self::MAX_LOAD_KG && $loadWeight > 0;
    }

}

?>