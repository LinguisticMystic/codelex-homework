<?php

//Write a program to play a word-guessing game like Hangman.
//
//    It must randomly choose a word from a list of words.
//    It must stop when all the letters are guessed.
//    It must give them limited tries and stop after they run out.
//    It must display letters they have already guessed (either only the incorrect guesses or all guesses).

class Game
{
    const wordList = [
        'leviathan',
        'lamborghini',
        'sombrero',
        'catastrophe',
        'mathematics',
        'diffusion',
        'superficial',
        'continuous',
        'establishment',
        'archeology'
    ];

    public array $word;
    public array $displayedWord;
    public array $missedLetters;
    public int $lives;

    public function __construct()
    {
        $this->word = str_split(self::wordList[rand(0, count(self::wordList) - 1)]);
        $this->displayedWord = array_fill(0, count($this->word), '_');
        $this->missedLetters = [];
        $this->lives = 5;
    }
}

function playGame(Game $game)
{
    while (true) {
        system('clear');

        echo 'Lives: ' . str_repeat('♥', $game->lives) . PHP_EOL;
        echo 'Word: ' . implode(' ', $game->displayedWord) . PHP_EOL;
        echo 'Misses: ' . implode(' ', $game->missedLetters) . PHP_EOL;

        if ($game->lives === 0) {
            echo 'YOU LOST!' . PHP_EOL;
        }

        if (!in_array('_', $game->displayedWord)) {
            echo 'YOU GOT IT!' . PHP_EOL;
        }

        if ($game->lives === 0 || !in_array('_', $game->displayedWord)) {
            $playAgain = readline('Play again? y/n...');
            if ($playAgain === 'n') {
                echo 'Thanks for playing!' . PHP_EOL;
                exit;
            }
            if ($playAgain === 'y') {
                playGame(new Game);
            }
        }

        $letter = readline('Guess letter...');
        while (strlen($letter) != 1 || is_numeric($letter)) {
            $letter = readline('One letter at a time. Try again...');
        }

        if (!in_array($letter, $game->word) && !in_array($letter, $game->missedLetters)) {
            array_push($game->missedLetters, $letter);
            $game->lives--;
        } else {
            foreach ($game->word as $index => $character) {
                if ($letter === $character) {
                    $game->displayedWord[$index] = $letter;
                }
            }
        }
    }
}

playGame(new Game());