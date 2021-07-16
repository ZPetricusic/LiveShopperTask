<?php

class Train{

    # Front and Back "enum"
    const FRONT = 1;

    const REAR = -1;

    # max capacity
    const MAX_CAPACITY = 30;


    ////////////////////////////////////
    //////      PROPERTIES      ////////
    ////////////////////////////////////

    # all the cars connected to the train
    private $carChain = [];

    # total weight of all connected cars
    private $totalWeight = 0;

    # the trains direction
    # c = cargo or passengers, E = engine
    # Eccccc -> FRONT, cccccE -> BACK
    # can't have ccEcc!
    private $movementDirection = 0;

    # add a boolean to check if there's an engine connected
    # faster than looping through the chain
    private $isEngineConnected = false;



    /////////////////////////////////
    //////      METHODS      ////////
    /////////////////////////////////

    # add a car to the train's front or rear
    public function addTrainCar(TrainCar $t, $placementSide){

        # if there's already 30 cars on the train
        if($this->isTrainFull())
            throw new Exception("Cannot add any more cars to the train!");

        # if the user wants to add an engine to a train which already has one
        if($this->isEngineConnected && $t->getCarType() === TrainCar::ENGINE)
            throw new Exception("An engine has already been connected to this train!");

        # if the placement is not correctly set
        if( !($this->isPlacementValid($placementSide)) )
            throw new Exception("Car placement can only be Train::FRONT or Train::REAR!");


        # if the train was already directed and now the user is
        # trying to add a car in a spot which would "block" the train
        # e.g. Ecc - current, want to add: xEcc
        if($this->movementDirection !== 0 && $placementSide === $this->movementDirection)
            throw new Exception("Cannot place the car on the selected side!");

        # attach the car to the train
        switch ($placementSide) {
            case Train::FRONT:
                array_unshift($this->carChain, $t);
                break;
            case Train::REAR:
                array_push($this->carChain, $t);
                break;
        }

        # if the user is adding an engine to existing cargo or passenger cars
        # we can direct the train
        if( ($t->getCarType() === TrainCar::ENGINE) && (count($this->carChain) > 0) ){
            $this->movementDirection = $placementSide;
            $this->isEngineConnected = true;
        }

        # adjust the weight
        $this->totalWeight += $t->getWeight();
    }




    # remove the car from a selected side
    public function removeTrainCar($placementSide){

            # if the placement is not correctly set
            if( !($this->isPlacementValid($placementSide)) )
                throw new Exception("Car placement can only be Train::FRONT or Train::REAR!");

            # if no cars of any type are attached to the "train"
            if( $this->isTrainEmpty() )
                throw new Exception("Cannot remove non-existing cars from empty train!");

            $removedCart = null;

            # detach the car from the train
            switch ($placementSide) {
                case Train::FRONT:
                    $removedCart = array_shift($this->carChain);
                    break;
                case Train::REAR:
                    $removedCart = array_pop($this->carChain);
                    break;
            }

            # if the user removes the engine "reset" the cars
            if($removedCart->getCarType() === TrainCar::ENGINE){
                $this->isEngineConnected = false;
                $this->movementDirection = 0;
            }

            #adjust the weight
            $this->totalWeight -= $removedCart->getWeight();
    }



    /////////////////////////////////////
    //////   GETTERS & SETTERS   ////////
    /////////////////////////////////////
    public function getTrainWeight(){
        return $this->totalWeight;
    }

    public function getTrainLength(){
        return count($this->carChain);
    }


    ////////////////////////////////////
    //////      AUXILIARIES     ////////
    ////////////////////////////////////
    public function printTrain(){

        #print format:
            //type[weight]
            //total weight of the train
        echo "Train: ";
        for($i = 0; $i < count($this->carChain); $i++)
            echo $this->carChain[$i]->getCarType().
                 "[".
                 $this->carChain[$i]->getWeight().
                 "]";
        echo "<br/>".$this->getTrainWeight();
        echo "<br/>".$this->getTrainLength();
        echo "<br/>";
    }

    private function isPlacementValid($placement){
        # returns true if the car type is one of the available options and is an integer
        # false otherwise
        return $placement === -1 || $placement === 1;
    }

    private function isTrainFull(){
        # returns true if there's more than or exactly 30 cars already on the train
        # false otherwise
        return count($this->carChain) >= Train::MAX_CAPACITY;
    }

    private function isTrainEmpty(){
        # returns true if there's no cars on the train
        # false otherwise
        return count($this->carChain) === 0;
    }
}

?>