<?php

class Survey
{
    private int $numOfPeopleSurveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;

    public function __construct(int $numOfPeopleSurveyed, float $purchasedEnergyDrinks, float $preferCitrusDrinks)
    {
        $this->numOfPeopleSurveyed = $numOfPeopleSurveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    public function getNumOfPeopleSurveyed(): int
    {
        return $this->numOfPeopleSurveyed;
    }

    function calculateEnergyDrinkers(): int
    {
        return $this->numOfPeopleSurveyed * $this->purchasedEnergyDrinks;
    }

    function calculatePreferCitrus(): int
    {
        return ($this->numOfPeopleSurveyed * $this->purchasedEnergyDrinks) * $this->preferCitrusDrinks;
    }
}

$survey = new Survey(12467, 0.14, 0.64);

echo "Total number of people surveyed " . $survey->getNumOfPeopleSurveyed() . PHP_EOL;
echo "Approximately " . $survey->calculateEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL;
echo $survey->calculatePreferCitrus() . " of those prefer citrus flavored energy drinks.";