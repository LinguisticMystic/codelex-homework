<?php

namespace App\Services;

use App\Repositories\BudgetRepository;

class RemoveFundsFromBudgetService
{
    private BudgetRepository $repository;

    public function __construct(BudgetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(float $amount): void
    {
        $this->repository->removeFunds($amount);
    }
}