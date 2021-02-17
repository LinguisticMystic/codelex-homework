<?php

//Create a non associative array with integers and print out only integers that divides by 3 without any left.

$numbers = [234, 346, 8, 2, 856, 665, 44, 768, 7, 12];

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 3 === 0) {
        echo $numbers[$i] . PHP_EOL;
    }
}