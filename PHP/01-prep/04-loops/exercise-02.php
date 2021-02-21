<?php

//Create an array with integers (up to 10) and print them out using for loop.

$numbers = [234, 346, 8, 2, 856, 665, 44, 768, 7, 12];

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . ', ';
}