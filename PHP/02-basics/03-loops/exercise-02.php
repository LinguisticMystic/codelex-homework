<?php

echo "Input number of terms: ";

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$number = readline();

for ($i = 1; $i <= $number; $i++) {
    echo $i * $i . PHP_EOL;
}