<?php

class FuelGauge
{
    private int $volume = 0;

    public function reportFuelLevel(): int
    {
        return $this->volume;
    }

    public function increaseFuelLevel(): void
    {
        if ($this->volume < 70) {
            $this->volume++;
        }
    }

    public function decreaseFuelLevel(): void
    {
        if ($this->volume > 0) {
            $this->volume--;
        }
    }
}

class Odometer
{
    private float $mileage = 0;

    public function reportMileage(): float
    {
        return $this->mileage;
    }

    public function increaseMileage(FuelGauge $fuelGauge): void
    {
        if ($this->mileage > 999.999) {
            $this->mileage = 0;
        }
        if ($this->mileage < 999.999) {
            $this->mileage++;
        }
        if ($this->mileage % 10 === 0) {
            $fuelGauge->decreaseFuelLevel();
        }
    }
}

$myCar = [
    'fuel' => new FuelGauge(),
    'odometer' => new Odometer()
];

echo 'Car\'s current fuel level: ' . $myCar['fuel']->reportFuelLevel() . ' liters.'. PHP_EOL;

while($myCar['fuel']->reportFuelLevel() !== 70) {
    $myCar['fuel']->increaseFuelLevel();
}

echo 'Fuel level after filling up: ' . $myCar['fuel']->reportFuelLevel() . ' liters.' . PHP_EOL;

echo 'Trip starts now...' . PHP_EOL;

while($myCar['fuel']->reportFuelLevel() > 0) {
    $myCar['odometer']->increaseMileage($myCar['fuel']);
    echo 'Current mileage: ' . $myCar['odometer']->reportMileage() . PHP_EOL;
    echo 'Current fuel level: ' . $myCar['fuel']->reportFuelLevel() . PHP_EOL;
}