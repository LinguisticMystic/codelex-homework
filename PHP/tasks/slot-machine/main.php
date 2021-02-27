<?php

require_once 'Player.php';
require_once 'Game.php';

$player = new Player();
$game = new Game();

do {
    $player->setBalance(readline('Enter starting balance...'));
} while (!filter_var($player->getBalance(), FILTER_VALIDATE_INT) || $player->getBalance() < 10);

function newBid($player)
{
    do {
        $bid = readline('Make a bid (increment 10)...');
        $player->increaseBid($bid);
    } while (!filter_var($bid, FILTER_VALIDATE_INT) || $bid % 10 !== 0 || $bid > $player->getBalance());
}

newBid($player);

while (true) {

    print("\033[2J\033[;H");

    if ($player->getBonusGame() > 0) {
        $player->removeOneBonusGame();
    } else {
        $player->decreaseBalance($player->getBid());
    }

    print("\033[2J\033[;H");
    echo 'Balance: ' . $player->getBalance() . PHP_EOL;
    echo 'Current bid: ' . $player->getBid() . PHP_EOL;
    echo 'Bonus games: ' . $player->getBonusGame() . PHP_EOL;

    $reel = $game->generateReel();
    $prize = 0;

    foreach ($reel as $line) {
        echo implode(' ', $line) . PHP_EOL;
        sleep(1);
    }

    //horizontal combos
    if ($reel[0][0] === $reel[0][1] && $reel[0][1] === $reel[0][2]) {
        if ($reel[0][0] === 'S') {
            $player->addBonusGames();
        } else {
            $prize = $game->getAwards()[$reel[0][0]] * ($player->getBid() / 10);
            $player->increaseBalance($prize);
        }
    }
    if ($reel[1][0] === $reel[1][1] && $reel[1][1] === $reel[1][2]) {
        if ($reel[1][0] === 'S') {
            $player->addBonusGames();
        } else {
            $prize = $game->getAwards()[$reel[1][0]] * ($player->getBid() / 10);
            $player->increaseBalance($prize);
        }
    }
    if ($reel[2][0] === $reel[2][1] && $reel[2][1] === $reel[2][2]) {
        if ($reel[2][0] === 'S') {
            $player->addBonusGames();
        } else {
            $prize = $game->getAwards()[$reel[2][0]] * ($player->getBid() / 10);
            $player->increaseBalance($prize);
        }
    }

    //diagonal combos
    if ($reel[0][0] === $reel[1][1] && $reel[1][1] === $reel[2][2]) {
        if ($reel[0][0] === 'S') {
            $player->addBonusGames();
        } else {
            $prize = $game->getAwards()[$reel[0][0]] * ($player->getBid() / 10);
            $player->increaseBalance($prize);
        }
    }
    if ($reel[0][2] === $reel[1][1] && $reel[1][1] === $reel[2][0]) {
        if ($reel[0][2] === 'S') {
            $player->addBonusGames();
        } else {
            $prize = $game->getAwards()[$reel[0][2]] * ($player->getBid() / 10);
            $player->increaseBalance($prize);
        }
    }

    echo 'Your prize: ' . $prize . PHP_EOL;

    if ($player->getBalance() <= 0) {
        exit('You are out of money! Come back when you have some dosh.');
    }

    if ($player->getBonusGame() > 0) {
        $play = readline('You got' . $player->getBonusGame() . 'bonus games. Play a bonus game? (y/n)...');
    } else {
        $play = readline('Play again? (y/n)...');
    }

    if ($play === 'n' || $player->getBid() > $player->getBalance()) {
        $newBid = readline('Make a new bid? (y/n)...');
        if ($newBid === 'n') {
            exit('Thanks for playing!');
        }
        newBid($player);
    }
}