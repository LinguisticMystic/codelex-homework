<?php

//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

$people = [
    $person1 = new stdClass(),
    $person2 = new stdClass(),
    $person3 = new stdClass(),
];

$person1->name = 'John';
$person1->surname = 'Doe';
$person1->age = 30;

$person2->name = 'Mary';
$person2->surname = 'Wood';
$person2->age = 28;

$person3->name = 'Billy';
$person3->surname = 'Smith';
$person3->age = 12;

function isOfAge($persons) {
    for ($i = 0; $i < count($persons); $i++) {
        if ($persons[$i]->age >=18) {
            echo "{$persons[$i]->name} has reached the age of 18. \n";
        } else {
            echo "{$persons[$i]->name} is underaged. \n";
        }
    }
}

isOfAge($people);