<?php

class Game
{
    const AWARDS = [
        'S' => 0,
        '❤' => 10,
        '✪' => 15,
        '♞' => 20,
        '∆' => 25,
        '◊' => 30
    ];

    public function getAwards(): array
    {
        return self::AWARDS;
    }

    public function generateReel(): array
    {
        return [
            array_rand($this->getAwards(), 3),
            array_rand($this->getAwards(), 3),
            array_rand($this->getAwards(), 3)
        ];
    }

}