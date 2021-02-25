<?php

//Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6, respectively.
//Otherwise, it shall print "Not a valid day".
//
//Use:
//
//    a "nested-if" statement
//    a "switch-case-default" statement.

do {
    $dayNumber = readline('Enter a number for a day of the week...');
} while (!is_numeric($dayNumber));

switch ($dayNumber) {
    case 0:
        echo 'Sunday';
        break;
    case 1:
        echo 'Monday';
        break;
    case 2:
        echo 'Tuesday';
        break;
    case 3:
        echo 'Wednesday';
        break;
    case 4:
        echo 'Thursday';
        break;
    case 5:
        echo 'Friday';
        break;
    case 6:
        echo 'Saturday';
        break;
    default:
        echo 'Not a valid day';
}

echo PHP_EOL;

do {
    $dayNumber = readline('Enter another number...');
} while (!is_numeric($dayNumber));

if ($dayNumber == 0) {
    echo 'Sunday';
} else
    if ($dayNumber == 1) {
        echo 'Monday';
    } else
        if ($dayNumber == 2) {
            echo 'Tuesday';
        } else
            if ($dayNumber == 3) {
                echo 'Wednesday';
            } else
                if ($dayNumber == 4) {
                    echo 'Thursday';
                } else
                    if ($dayNumber == 5) {
                        echo 'Friday';
                    } else
                        if ($dayNumber == 6) {
                            echo 'Saturday';
                        } else {
                            echo 'Not a valid day';
                        }