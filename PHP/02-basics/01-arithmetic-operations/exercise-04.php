<?php

//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
//Take note that it is the same as factorial of N.

$chosenNumber = readline('Enter a number...');

$numbersArray = [];

for ($i = 1; $i <= $chosenNumber; $i++) {
    array_push($numbersArray, $i);
}

$multiplied = array_reduce($numbersArray, function($a, $b) {return $a * $b;}, 1);

echo $multiplied;