<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $startingBalance)
    {
        $this->name = $name;
        $this->balance = $startingBalance;
    }

    public function showUserNameAndBalance(): string
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return $this->name . ', '. money_format('%+n', $this->balance);
    }

}

$ben = new BankAccount('Benson', -17.5);

echo $ben->showUserNameAndBalance();