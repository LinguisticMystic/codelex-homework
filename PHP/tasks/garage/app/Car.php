<?php

namespace App;

class Car
{
    private string $name;
    private string $model;
    private int $fuelConsumption;
    private int $price;
    private bool $isAvailable;

    public function __construct(string $name, string $model, int $litersPerHundredKm, int $price, bool $isAvailable = true)
    {
        $this->name = $name;
        $this->model = $model;
        $this->fuelConsumption = $litersPerHundredKm;
        $this->price = $price;
        $this->isAvailable = $isAvailable;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}