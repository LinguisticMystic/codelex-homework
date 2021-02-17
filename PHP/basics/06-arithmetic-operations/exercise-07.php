<?php

//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.
//The formula in Math notation is: X(t) = 0.5 * at^2 + vt + x
//Note: The correct value is -490.5m.

$a = -9.81;
$t = 10;
$v = 0;
$x = 0;

function formula($a, $t, $v, $x)
{
    return 0.5 * $a * pow($t, 2) + $v * $t + $x;
}

echo formula(-9.81, 10, 0, 0);