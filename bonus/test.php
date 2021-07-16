<?php

error_reporting(1);

require_once "Train.php";
require_once "EngineCar.php";
require_once "PassengerCar.php";
require_once "CargoCar.php";
require_once "EngineType.php";

try{

    $t = new Train();

    $c1 = new CargoCar(200, 12423);
    $c2 = new PassengerCar(200, 92);
    $c3 = new CargoCar(500, 6723);
    $c4 = new PassengerCar(200, 17);
    $c5 = new EngineCar(220, EngineType::DIESEL);
    $c6 = new PassengerCar("250", "26"); #works with string
    //$c7 = new PassengerCar("250", 566); #error

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

    // $t->removeTrainCar(0); # error

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