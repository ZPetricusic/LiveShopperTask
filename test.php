<?php

error_reporting(1);

require_once "Train.php";
require_once "TrainCar.php";

try{

    $t = new Train();

    $c1 = new TrainCar(200, TrainCar::CARGO);
    $c2 = new TrainCar(200, TrainCar::PASSENGER);
    $c3 = new TrainCar(500, TrainCar::CARGO);
    $c4 = new TrainCar(200, TrainCar::PASSENGER);
    $c5 = new TrainCar(220, TrainCar::ENGINE);
    $c6 = new TrainCar("250", TrainCar::PASSENGER); #works with string
    //$c7 = new TrainCar("khj", TrainCar::PASSENGER); #error

    $c1->setWeight(800);

    $t->addTrainCar($c1, Train::FRONT);
    $t->addTrainCar($c2, Train::REAR);
    $t->addTrainCar($c3, Train::FRONT);
    $t->addTrainCar($c4, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);

    $t->printTrain();

    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::REAR);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    $t->removeTrainCar(Train::FRONT);
    #error
    // $t->removeTrainCar(Train::FRONT);
    // $t->removeTrainCar(Train::FRONT);
    // $t->removeTrainCar(Train::FRONT);

    //$t->removeTrainCar(0); # error

    $t->printTrain();

    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c2, Train::FRONT);
    $t->addTrainCar($c5, Train::REAR); // engine
    //$t->addTrainCar($c6, Train::REAR); # error


    $t->printTrain();

} catch(Exception $e){
    echo $e->getMessage();
}

?>