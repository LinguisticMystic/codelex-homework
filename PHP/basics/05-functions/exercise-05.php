<?php

//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
//Create a secondary array with shipping costs per weight.
//Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        'type' => 'apples',
        'weight' => 1
    ],
    [
        'type' => 'grapes',
        'weight' => 0.2
    ],
    [
        'type' => 'pears',
        'weight' => 0.5
    ],
    [
        'type' => 'watermelons',
        'weight' => 12
    ],
    [
        'type' => 'jack fruits',
        'weight' => 15
    ]
];

$shippingCosts = [
    '<10' => 1,
    '>10' => 2
];

function printShippingCosts($productArray, $shippingCosts) {
    for ($i = 0; $i < count($productArray); $i++) {
        if ($productArray[$i]['weight'] < 10) {
            echo ucfirst("{$productArray[$i]['type']} weigh {$productArray[$i]['weight']} kg, and their shipping cost is {$shippingCosts['<10']} euro. \n");
        }
        if ($productArray[$i]['weight'] > 10) {
            echo ucfirst("{$productArray[$i]['type']} weigh {$productArray[$i]['weight']} kg, and their shipping cost is {$shippingCosts['>10']} euros. \n");
        }
    }
}

printShippingCosts($fruits, $shippingCosts);