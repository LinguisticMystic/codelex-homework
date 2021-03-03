<?php

class SavingsAccount
{
    private float $annualInterestRate;
    private float $balance;
    private array $deposits = [];
    private array $withdrawals = [];
    private array $interestEarned = [];

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getTotalDeposited(): float
    {
        return array_sum($this->deposits);
    }

    public function getTotalWithdrawn(): float
    {
        return array_sum($this->withdrawals);
    }

    public function getTotalInterest(): float
    {
        return array_sum($this->interestEarned);
    }

    public function setAnnualInterestRate(float $amount): void
    {
        $this->annualInterestRate = $amount;
    }

    public function withdraw($amount): void
    {
        $this->withdrawals[] = $amount;
        $this->balance -= $amount;
    }

    public function deposit(float $amount): void
    {
        $this->deposits[] = $amount;
        $this->balance += $amount;
    }

    public function addMonthlyInterestRate(): void
    {
        $monthlyInterestRate = ($this->annualInterestRate / 12);
        $this->interestEarned[] = $monthlyInterestRate * $this->balance;
        $this->balance += $monthlyInterestRate * $this->balance;
    }
}

do {
    $balance = readline('How much money is in the account?: ');
} while ($balance < 0 || !is_numeric($balance));
do {
    $annualInterest = readline('Enter the annual interest rate: ');
} while ($annualInterest < 0 || !is_numeric($annualInterest));
do {
    $duration = readline('For how long has the account been open: ');
} while ($duration < 0 || !is_numeric($duration));


$account = new SavingsAccount($balance);
$account->setAnnualInterestRate($annualInterest);


for ($i = 1; $i <= $duration; $i++) {
    do {
        $deposit = readline("Enter amount deposited for month $i: ");
    } while ($deposit < 0 || !is_numeric($deposit));
    do {
        $withdrawal = readline("Enter amount withdrawn for $i: ");
    } while ($withdrawal < 0 || !is_numeric($withdrawal));

    $account->deposit($deposit);
    $account->withdraw($withdrawal);
    $account->addMonthlyInterestRate();
}


echo 'Total deposited: $' . number_format($account->getTotalDeposited(), 2, '.', ',') . PHP_EOL;
echo 'Total withdrawn: $' . number_format($account->getTotalWithdrawn(), 2, '.', ',') . PHP_EOL;
echo 'Interest earned: $' . number_format($account->getTotalInterest(), 2, '.', ',') . PHP_EOL;
echo 'Ending balance: $' . number_format($account->getBalance(), 2, '.', ',') . PHP_EOL;
