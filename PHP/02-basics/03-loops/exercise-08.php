<?php

//Write a console program in a class named NumberSquare that prompts the user for two integers, a min and a max,
//and prints the numbers in the range from min to max inclusive in a square pattern.
//Each line of the square consists of a wrapping sequence of integers increasing from min and max.
//The first line begins with min, the second line begins with min + 1, and so on.
//When the sequence in any line reaches max, it wraps around back to min.
//You may assume that min is less than or equal to max.
//Here is an example dialogue:
//
//Min? 1
//Max? 5
//12345
//23451
//34512
//45123
//51234

class NumberSquare
{
    public string $minNumber;
    public string $maxNumber;
    public array $range = [];

    public function createRange(): void
    {
        for ($i = $this->minNumber; $i <= $this->maxNumber; $i++) {
            $this->range[] = $i;
        }
    }

    public function wrap(): void
    {
        for ($i = 1; $i < count($this->range); $i++) {
            array_push($this->range, array_shift($this->range));
            echo implode('', $this->range) . PHP_EOL;
        }
    }

    public function getRange(): array
    {
        return $this->range;
    }

}

$numberphile = new NumberSquare();

do {
    $numberphile->minNumber = readline('Enter minimum number: ');
} while (!filter_var($numberphile->minNumber, FILTER_VALIDATE_INT));

do {
    $numberphile->maxNumber = readline('Enter maximum number: ');
} while (!filter_var($numberphile->maxNumber, FILTER_VALIDATE_INT) || $numberphile->maxNumber < $numberphile->minNumber);

$numberphile->createRange();

echo implode('', $numberphile->getRange()) . PHP_EOL;

$numberphile->wrap();