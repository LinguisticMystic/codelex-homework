<?php

//Create a person object with name, surname and age.
//Create a function that will determine if the person has reached 18 years of age.
//Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = 'John';
$person->surname = 'Doe';
$person->age = 30;

function isOfAge($person) {
    if ($person->age >=18) {
        echo "$person->name has reached the age of 18.";
    }
}

isOfAge($person);