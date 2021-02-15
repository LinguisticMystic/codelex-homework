<?php

//Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
//Range should be stored within the 2 separated variables $y and $z.

$x = 2200;
$y = 3120;
$z = 1200;

if ($x >= $y && $x <= $z || $x >= $z && $x <= $y) {
    echo 'correct';
}