<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function balance(): string
    {
        return number_format($this->balance, 2);
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function printAccount(): string
    {
        return $this->name . ' balance is ' . number_format($this->balance, 2);
    }

}

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->printAccount() . PHP_EOL;
echo $bartosSwissAccount->printAccount() . PHP_EOL;

$bartosAccount->withdrawal(20);
echo "Barto's account balance is now: " . $bartosAccount->balance() . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo "Barto's Swiss account balance is now: " . $bartosSwissAccount->balance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartosAccount->printAccount() . PHP_EOL;
echo $bartosSwissAccount->printAccount() . PHP_EOL;

/////Your first account
$aijasAccount = new Account("Aija's account", 100.00);
$aijasAccount->deposit(20);
echo $aijasAccount->printAccount() . PHP_EOL;

/////Your first money transfer
$mattsAccount = new Account("Matt's account", 1000.00);
$myAccount = new Account("My account", 0);
$mattsAccount->withdrawal(100);
$myAccount->deposit(100);
echo $mattsAccount->printAccount() . PHP_EOL;
echo $myAccount->printAccount() . PHP_EOL;

/////Money transfers
class Bank
{
    public function transfer(Account $from, Account $to, int $howMuch): void
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }
}

$aAccount = new Account("A", 100);
$bAccount = new Account("B", 0);
$cAccount = new Account("C", 0);

$superBank = new Bank();

$superBank->transfer($aAccount, $bAccount, 50); //Transfers 50.0 from account A to account B
$superBank->transfer($bAccount, $cAccount, 25); //Transfers 25.0 from account B to account C

echo $aAccount->printAccount() . PHP_EOL;
echo $bAccount->printAccount() . PHP_EOL;
echo $cAccount->printAccount() . PHP_EOL;