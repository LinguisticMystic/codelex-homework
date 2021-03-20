<?php

use App\Car;
use App\CarCollection;

require_once 'vendor/autoload.php';

$carData = json_decode(file_get_contents('cars.json'));

//if JSON file does not contain data, populate it with car collection
if (empty($carData)) {
    $myCarCollection = new CarCollection();

    $myCarCollection->addManyCars([
        new Car('Tesla', 'Model 3', 0, 129),
        new Car('Toyota', 'Aqua Hybrid', 4, 77),
        new Car('Mazda', '5 Premacy', 8, 88),
        new Car('Nissan', 'Serena', 10, 91),
    ]);

    $jsonData = [];

    foreach ($myCarCollection->collection() as $car) {
        $jsonData[] = $car->jsonSerialize();
    }

    file_put_contents('cars.json', json_encode($jsonData));
}

function rent(array $carData, int $i): void
{
    $carData[$i]->isAvailable = false;
    file_put_contents('cars.json', json_encode($carData));
}

function bringBack(array $carData, int $i): void
{
    $carData[$i]->isAvailable = true;
    file_put_contents('cars.json', json_encode($carData));
}

for ($i = 0; $i < count($carData); $i++) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['rent'][$i])) {
        rent($carData, $i);
        header('Location: index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['return'][$i])) {
        bringBack($carData, $i);
        header('Location: index.php');
    }
}

require 'indexView.php';