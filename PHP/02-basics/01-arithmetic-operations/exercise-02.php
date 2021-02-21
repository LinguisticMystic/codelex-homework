<?php

//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
//The program shall always print “bye!” before exiting.

function checkOddEven(int $number): string
{
    if ($number % 2 == 0) {
        return 'Even Number' . PHP_EOL;
    }
    if ($number % 2 == 1) {
        return 'Odd Number' . PHP_EOL;
    }
}

$number = readline('Enter number...');

echo checkOddEven($number);

exit('bye!');