<?php

//Concatenate your name, surname and integer of your age.

$name = 'Aija';
$surname = 'Pastare';
$age = 30;

echo $name . ' ' . $surname . ' ' . $age;

//Object
$person = new stdClass();
$person->name = 'Aija';
$person->surname = 'Pastare';
$person->age = 30;

echo sprintf('My name is %s %s and I am %u years old.', $person->name, $person->surname, $person->age);
