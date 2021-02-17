<?php

//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
//Create a secondary array with shipping costs per weight.
//Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        'type' => 'apples',
        'weight' => 2
    ],
    [
        'type' => 'grapes',
        'weight' => 12
    ],
    [
        'type' => 'pears',
        'weight' => 30
    ],
    [
        'type' => 'watermelons',
        'weight' => 18
    ],
    [
        'type' => 'jack fruits',
        'weight' => 50
    ]
];

$shippingCosts = [
    10 => 1,
    20 => 2,
    30 => 3,
];

foreach ($fruits as $fruit) {

    $price = 0;

    foreach ($shippingCosts as $weight => $cost) {
        if ($fruit['weight'] <= $weight) {
            $price = $cost;
            break;
        } else {
            $price = 4;
        }
    }

    echo ucfirst(sprintf('The shipping price for %s is %u euros.', $fruit['type'], $price)) . PHP_EOL;

}