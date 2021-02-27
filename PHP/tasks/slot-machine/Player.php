<?php

class Player
{
    private int $balance;
    private int $bid;
    private int $bonusGame = 0;

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $amount): void
    {
        $this->balance = $amount;
    }

    public function increaseBalance(int $amount): void
    {
        $this->balance += $amount;
    }

    public function decreaseBalance(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function getBid(): int
    {
        return $this->bid;
    }

    public function increaseBid(int $amount): void
    {
        $this->bid = $amount;
    }

    public function getBonusGame(): int
    {
        return $this->bonusGame;
    }

    public function removeOneBonusGame(): void
    {
        $this->bonusGame--;
    }

    public function addBonusGames(): void
    {
        $this->bonusGame += 5;
    }

}