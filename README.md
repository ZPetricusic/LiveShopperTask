# Train Dev Test

Here I will clarify some of my decisions in the code.

## Thought process

A train can be assembled in two ways:

1. Only non-engine cars are connected, therefore we still don't know in which direction
   the train will head

2. All possible car types are connected, using only one engine(!) which then,
   together with at least one car, can dictate the trains direction.
   For example, if we connect the engine and cargo cars like **_Ec_** then the train is headed left, and vice versa.

## Train.php

- PHP does not yet properly support enumerations so I used constants instead
- The train's total weight could be calculated by looping over the car chain list,
  however I find it easier and most importantly **quicker** to adjust the weight in the
  methods themselves

## TrainCar.php

- Same reason for using constants as in Train.php
