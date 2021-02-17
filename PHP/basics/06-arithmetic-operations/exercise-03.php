<?php

//Write a program to produce the sum of 1, 2, 3, ..., to 100.
//Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily.
//Also compute and display the average. The output shall look like:

//The sum of 1 to 100 is 5050
//The average is 50.5

$lowestNumber = readline('Choose the lowest number...');
$highestNumber = readline('Choose the highest number...');

while ($highestNumber < $lowestNumber) {
    echo 'The second number cannot be lower than the first one. ';
    $highestNumber = readline('Choose again...');
}

$numbersArray = [];

for ($i = $lowestNumber; $i <= $highestNumber; $i++) {
    array_push($numbersArray, $i);
}

$sum = array_sum($numbersArray);
$average = $sum / count($numbersArray);

echo sprintf('The sum of %u to %u is %u.', $lowestNumber, $highestNumber, $sum) . PHP_EOL;
echo sprintf('The average is %.1f.', $average) . PHP_EOL;