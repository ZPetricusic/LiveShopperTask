<?php

require_once "TrainCar.php";

class PassengerCar extends TrainCar{

    ////////////////////////////////////
    //////      PROPERTIES      ////////
    ////////////////////////////////////

    # not required, added to distinct the car types
    const MAX_SEAT_COUNT = 100;

    private int $seatCount;

    function __construct($weight, $seatCount)
    {
        # if the weight is not properly assigned
        if( !(parent::isValidWeight($weight)) )
            throw new Exception("Car weight must be a positive number!");

        # check for invalid seat count
        if( !($this->isSeatCountValid($seatCount)) )
            throw new Exception("Number of seats per passenger car must be in range <0, ".self::MAX_SEAT_COUNT."].");

        # otherwise, set the properties
        $this->weight = $weight;
        $this->seatCount = $seatCount;
    }



    /////////////////////////////////
    //////      METHODS      ////////
    /////////////////////////////////
    public function printCar(){
        echo "[".$this->seatCount."<sub>".$this->weight."kg</sub>]";
    }


    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////

    # is the seatCount a numeric value in range <0,100]
    private function isSeatCountValid($seatCount){
        return is_numeric($seatCount) && $seatCount <= self::MAX_SEAT_COUNT && $seatCount > 0;
    }
}

?>