<?php

//izveidot vaikalinju
//izdrukat sarakstu ar produktiem (5 produkti)
//izveleties ko grib pirkt
//izveleties amount
//izdrukaat order


$products = [
    [
        'name' => 'axe',
        'price' => 50
    ],
    [
        'name' => 'nunchakus',
        'price' => 25
    ],
    [
        'name' => 'grenade',
        'price' => 130
    ],
    [
        'name' => 'katana',
        'price' => 4100
    ],
    [
        'name' => 'knuckles',
        'price' => 5
    ],
];

echo 'The following items are available for purchase:' . PHP_EOL;

foreach ($products as $index => $product) {
    echo $index + 1 . ' ' . $product['name'] . PHP_EOL;
}

$productChoice = readline('Please pick an item from the list (pick a number)...');
while (!is_numeric($productChoice) || $productChoice < 1 || $productChoice > count($products)) {
    $productChoice = readline('Try again (pick a number)...');
}
$productAmount = readline('Enter an amount...');
while (!is_numeric($productAmount)) {
    $productAmount = readline('Try again (enter an amount)...');
}

$price = 0;

foreach ($products as $index => $product) {
    if ($productChoice == $index + 1) {
        $price = $product['price'] * $productAmount;
    }
}

echo 'Chosen product: ' . $products[$productChoice - 1]['name'] . '. Chosen amount: ' . $productAmount . '. Total price: ' . $price . ' dollars.' . PHP_EOL;
