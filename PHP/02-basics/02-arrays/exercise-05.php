<?php

//Tic-Tac-Toe

$gameBoard = [
    ['.', '.', '.'],
    ['.', '.', '.'],
    ['.', '.', '.']
];

$x = null;
$y = null;
$currentTurn = null;

while (true) {
    system('clear');

    $xCount = null;
    $yCount = null;
    $emptyCells = true;

    foreach ($gameBoard as $row) {

        foreach ($row as $cell) {

            if ($cell === '.') {
                $emptyCells = false;
            }
            if ($cell === 'X') {
                $xCount++;
            }
            if ($cell === 'O') {
                $yCount++;
            }
            echo $cell . ' ';
        }
        echo PHP_EOL;
    }

    if ($xCount > $yCount) {
        $currentTurn = 'O';
    } else {
        $currentTurn = 'X';
    }

    //tied game
    if ($emptyCells === true) {
        echo 'THE GAME IS TIED!';
        exit;
    }
    //horizontal winning combos
    if ($gameBoard[0][0] !== '.' && $gameBoard[0][0] === $gameBoard[0][1] && $gameBoard[0][1] == $gameBoard[0][2]) {
        echo $gameBoard[0][0] . ' WON THE GAME!';
        exit;
    }
    if ($gameBoard[1][0] !== '.' && $gameBoard[1][0] === $gameBoard[1][1] && $gameBoard[1][1] == $gameBoard[1][2]) {
        echo $gameBoard[1][0] . ' WON THE GAME!';
        exit;
    }
    if ($gameBoard[2][0] !== '.' && $gameBoard[2][0] === $gameBoard[2][1] && $gameBoard[2][1] == $gameBoard[2][2]) {
        echo $gameBoard[2][0] . ' WON THE GAME!';
        exit;
    }
    //vertical winning combos
    if ($gameBoard[0][0] !== '.' && $gameBoard[0][0] === $gameBoard[1][0] && $gameBoard[1][0] == $gameBoard[2][0]) {
        echo $gameBoard[0][0] . ' WON THE GAME!';
        exit;
    }
    if ($gameBoard[0][1] !== '.' && $gameBoard[0][1] === $gameBoard[1][1] && $gameBoard[1][1] == $gameBoard[2][1]) {
        echo $gameBoard[0][1] . ' WON THE GAME!';
        exit;
    }
    if ($gameBoard[0][2] !== '.' && $gameBoard[0][2] === $gameBoard[1][2] && $gameBoard[1][2] == $gameBoard[2][2]) {
        echo $gameBoard[0][2] . ' WON THE GAME!';
        exit;
    }
    //diagonal winning combos
    if ($gameBoard[0][0] !== '.' && $gameBoard[0][0] === $gameBoard[1][1] && $gameBoard[1][1] == $gameBoard[2][2]) {
        echo $gameBoard[0][0] . ' WON THE GAME!';
        exit;
    }
    if ($gameBoard[0][2] !== '.' && $gameBoard[0][2] === $gameBoard[1][1] && $gameBoard[1][1] == $gameBoard[2][0]) {
        echo $gameBoard[0][2] . ' WON THE GAME!';
        exit;
    }

    $input = readline("$currentTurn, choose your location (row, space, column)...");
    echo PHP_EOL;

    while (strlen($input) < 3) {
        $input = readline("Location must must consist of two coordinates. $currentTurn, try again (row, space, column)...") . PHP_EOL;
    }

    $x = (int)explode(' ', $input)[0];
    $y = (int)explode(' ', $input)[1];

    if ($gameBoard[$x][$y] === '.') {
        $gameBoard[$x][$y] = $currentTurn;
    }
}