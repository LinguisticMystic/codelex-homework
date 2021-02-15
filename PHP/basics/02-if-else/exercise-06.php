<?php

//Create a variable $plateNumber that stores your car plate number. Create a switch statement that prints out that its your car in case of your number.

$plateNumber = 'MC9000';

switch ($plateNumber) {
    case 'MC9000':
        echo 'It is my plate number.';
        break;
    default:
        echo 'It is not my plate number.';
        break;
}

//Ternary
echo $plateNumber === 'MC9000' ? 'It is my plate number.' : 'It is not my plate number.';