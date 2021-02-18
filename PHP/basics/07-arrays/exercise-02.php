<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers
$sum = array_sum($numbers);
$average = $sum / count($numbers);

echo sprintf('%.1f', $average);