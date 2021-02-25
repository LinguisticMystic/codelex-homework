<?php

//Write a program that reads an positive integer and count the number of digits the number has.

do {
    $integer = readline('Enter a positive integer...');
} while (!filter_var($integer, FILTER_VALIDATE_INT) || $integer < 0);

echo strlen($integer);