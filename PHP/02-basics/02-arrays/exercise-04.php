<?php

//Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array. It should copy all the elements of that array into another array of the same size.
//
//Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.
//
//    Create an array of ten integers
//    Fill the array with ten random numbers (1-100)
//    Copy the array into another array of the same capacity
//    Change the last value in the first array to a -7
//    Display the contents of both arrays
//
//Array 1: 45 87 39 32 93 86 12 44 75 -7
//Array 2: 45 87 39 32 93 86 12 44 75 50

$numbersArray = [];

while (count($numbersArray) !== 10) {
    echo PHP_EOL;
    $number = readline('Enter 10 random numbers from 1 to 100 to populate the array. A number has to be 1-2 digits long...');
    while (strlen((string)$number) < 1 || strlen((string)$number) > 2 || !is_numeric($number)) {
        $number = readline('Number has to be 1-2 digits long...');
    }
    while ($number < 0) {
        $number = readline('No negative numbers please. Try again...');
    }
    array_push($numbersArray, $number);
    system('clear');
    foreach ($numbersArray as $number) {
        echo $number . ' ';
    }
}

$copiedNumbersArray = $numbersArray;
array_pop($numbersArray);
array_push($numbersArray, -7);

echo PHP_EOL . 'Array 1: ';
foreach ($numbersArray as $number) {
    echo $number . ' ';
}

echo PHP_EOL . 'Array 2: ';
foreach ($copiedNumbersArray as $number) {
    echo $number . ' ';
}