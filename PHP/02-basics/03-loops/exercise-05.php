<?php

//Write a console program in a class named Piglet that implements a simple 1-player dice game called "Piglet" (based on the game "Pig").
//The player's goal is to accumulate as many points as possible without rolling a 1.
//Each turn, the player rolls the die; if they roll a 1, the game ends and they get a score of 0.
//Otherwise, they add this number to their running total score.
//The player then chooses whether to roll again, or end the game with their current point total.

class Piglet
{
    public int $points = 0;

    public function rollDice(): int
    {
        return rand(1, 6);
    }

    public function addPoints(int $result): void
    {
        $this->points += $result;
    }

    public function getPoints(): int
    {
        return $this->points;
    }
}

$player = new Piglet();

echo 'Welcome to Piglet!' . PHP_EOL;

while (true) {
    $roll = $player->rollDice();
    echo 'You rolled ' . $roll . '!' . PHP_EOL;

    if ($roll == 1) {
        $player->points = 0;
        exit('You got ' . $player->getPoints() . ' points.');
    } else {
        $player->addPoints($roll);
    }

    $again = readline('Roll again? (y/n)...');
    if ($again === "n") {
        exit('You got ' . $player->getPoints() . ' points.');
    }
}