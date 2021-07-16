<?php

class Train{

    # Front and Back "enum"
    const FRONT = 1;

    const REAR = -1;

    # max capacity
    const MAX_CAPACITY = 30;

    # PROPERTIES

    # all the cars connected to the train
    private $carChain = [];

    # train's total weight should be 0 at the beginning
    private $totalWeight = 0;

    # the trains orientation
    # c = cargo or passengers, E = engine
    # Eccccc -> FRONT, cccccE -> BACK
    # can't have ccEcc!
    private $orientation = 0;

    # add a boolean to check if there's an engine connected
    # faster than looping through the chain
    private $isEngineConnected = false;

    # add a car to the train's front or rear
    public function addTrainCar(TrainCar $t, $placement){

        # if there's already 30 cars on the train
        if($this->isTrainFull())
            throw new Exception("Cannot add any more cars to the train!");

        # if the user wants to add an engine to a train which already has one
        if($this->isEngineConnected && $t->getCarType() === TrainCar::ENGINE)
            throw new Exception("An engine has already been connected to this train!");

        # if the placement is not correctly set
        if( !($this->isPlacementValid($placement)) )
            throw new Exception("Car placement can only be Train::FRONT or Train::REAR!");

        # if the train was already orientated
        # based on the engine and at least one car
        if($this->orientation !== 0){

            # check if the wanted placement does not match the current train orientation
            if($placement === $this->orientation)
                throw new Exception("Cannot place the car on the selected side!");

            # since no engine can be added once the orientation is set
            # we can just add the car which will be either a cargo or a passenger one
            switch ($placement) {
                case Train::FRONT:
                    array_unshift($this->carChain, $t);
                    break;
                case Train::REAR:
                    array_push($this->carChain, $t);
                    break;
            }

        } else{ // not having the train orientated gives a little bit more freedom

            # attach the car to the train
            switch ($placement) {
                case Train::FRONT:
                    array_unshift($this->carChain, $t);
                    break;
                case Train::REAR:
                    array_push($this->carChain, $t);
                    break;
            }

            # if the user is adding an engine to existing cargo or passenger cars
            # it means we can direct the train
            if( ($t->getCarType() === TrainCar::ENGINE) && (count($this->carChain) > 0) ){
                $this->orientation = $placement;
                $this->isEngineConnected = true;
            }

        }

        # adjust the weight
        $this->totalWeight += $t->getWeight();
    }

    # remove the car from a selected side
    public function removeTrainCar($side){

            # if the placement is not correctly set
            if( !($this->isPlacementValid($side)) )
                throw new Exception("Car placement can only be Train::FRONT or Train::REAR!");

            # if the "train" is already empty
            if( $this->isTrainEmpty() )
                throw new Exception("Cannot remove non-existing cars from empty train!");

            $removedCart = null;

            # detach the car from the train
            switch ($side) {
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
                $this->orientation = 0;
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

        for($i = 0; $i < count($this->carChain); $i++)
            echo $this->carChain[$i]->getCarType()."[".$this->carChain[$i]->getWeight()."]";
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
    # get za broj carova

    # total tezina cijelog vlaka

    /*
        NAPUTCI

        Vlak ne moze imati lokomotivu u sredini

        Kad se doda lokomotiva i prvi vagon oni diktiraju smjer "punjenja" vlaka

        Javi ako ne postoji lokomotiva trenutno u lancu
    */
}

?>