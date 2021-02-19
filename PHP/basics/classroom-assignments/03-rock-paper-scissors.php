<?php

$validChoices = [1 => 'rock', 2 => 'paper', 3 => 'scissors'];
$randomNumber = rand(1, 3);
$computerMove = $validChoices[$randomNumber];

echo 'Valid moves:' . PHP_EOL;
foreach ($validChoices as $key => $option) {
    echo $key . ' ' . $option . PHP_EOL;
}

$playerNumber = readline('Make your move (pick a number)...');

while (!array_key_exists($playerNumber, $validChoices)) {
    $playerNumber = readline('Invalid move. Try again...');
}

$playerMove = $validChoices[$playerNumber];

echo 'You picked ' . $playerMove . PHP_EOL;
echo 'Computer picked ' . $computerMove . PHP_EOL;

$winningCombos = ['rock' => 'scissors', 'scissors' => 'paper', 'paper' => 'rock'];

if ($playerMove === $computerMove) {
    echo 'IT\'S A TIE!';
    exit;
}
if ($winningCombos[$playerMove] === $computerMove) {
    echo 'YOU WON!';
    exit;
}
if ($winningCombos[$playerMove] !== $computerMove) {
    echo 'YOU LOST!';
    exit;
}