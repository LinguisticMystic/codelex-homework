<?php

namespace App;

class CarCollection
{
    private array $cars = [];

    public function addCar(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function addManyCars(array $carArray): void
    {
        foreach ($carArray as $car) {
            $this->addCar($car);
        }
    }

    public function collection(): array
    {
        return $this->cars;
    }

}