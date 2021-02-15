<?php

//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.

$myNumber = 14;
$x = 10;
$y = 20;

if ($myNumber > $x) {
    echo "$myNumber is greater than $x. \n";
}
if ($myNumber < $y) {
    echo "$myNumber is less than $y. \n";
}
if ($myNumber % 2 === 0) {
    echo "$myNumber is an even number. \n";
}

//Check everything
if ($myNumber > $x && $myNumber < $y && $myNumber % 2 === 0) {
    echo 'All checks passed.';
} else {
    echo 'Checks did not pass.';
}