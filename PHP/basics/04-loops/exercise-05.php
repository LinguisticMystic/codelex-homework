<?php

//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.

$persons = [
    'anna' => $myFriend = new stdClass(),
    'jesus' => $myHero = new stdClass(),
    'janis' => $myNeighbor = new stdClass(),
];

$myFriend->name = 'Anna';
$myFriend->surname = 'Dzērve';
$myFriend->age = 24;
$myFriend->birthday = '19 May, 1995';

$myHero->name = 'Jesus';
$myHero->surname = 'of Nazareth';
$myHero->age = 33;
$myHero->birthday = '24 December, 0';

$myNeighbor->name = 'Jānis';
$myNeighbor->surname = 'Bērziņš';
$myNeighbor->age = 35;
$myNeighbor->birthday = '14 June, 1985';

foreach ($persons as $person) {
    echo "Name: $person->name $person->surname, Age: $person->age, Birthday: $person->birthday. \n";
};