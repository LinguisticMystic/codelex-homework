<?php

//denomination => amount
$wallet = [
    1 => 0,
    2 => 5,
    5 => 2,
    10 => 4,
    20 => 5,
    50 => 2,
    100 => 2,
    200 => 1
];

$menu = [
    1 => [
        'name' => 'Latte',
        'price' => 220
    ],
    2 => [
        'name' => 'Black',
        'price' => 180
    ],
    3 => [
        'name' => 'Espresso',
        'price' => 200
    ]
];

function countMoneyInWallet(array $wallet): float
{
    $totalValueForEachDenomination = [];
    foreach ($wallet as $denomination => $amount) {
        array_push($totalValueForEachDenomination, $denomination * $amount);
    }
    return array_sum($totalValueForEachDenomination);
}

for ($i = 1; $i < count($menu) + 1; $i++) {
    $price = $menu[$i]['price'] / 100;
    echo "[$i] {$menu[$i]['name']} {$price}" . PHP_EOL;
}

$choice = readline('Select your product choice (pick a number): ');
while ($choice < 1 || $choice > 3) {
    $choice = readline('Invalid choice. Try again: ');
}

if (countMoneyInWallet($wallet) < $menu[$choice]['price']) {
    exit('You lack the necessary funds. Your chosen product costs ' . (int)$menu[$choice]['price'] / 100 . ' but you only have ' . countMoneyInWallet($wallet) / 100);
}

$totalCoinsInserted = [];
$change = null;

while (true) {
    print("\033[2J\033[;H");
    echo 'You currently have a total of ' . countMoneyInWallet($wallet) / 100 . ' in your wallet.' . PHP_EOL;
    echo 'Selected item: ' . $menu[$choice]['name'] . PHP_EOL;
    echo 'Price: ' . $menu[$choice]['price'] / 100 . PHP_EOL;
    echo 'Total inserted: ' . array_sum($totalCoinsInserted) / 100 . PHP_EOL;

    if (array_sum($totalCoinsInserted) >= $menu[$choice]['price']) {
        $change = array_sum($totalCoinsInserted) - (int)$menu[$choice]['price'];
        break;
    }

    $coinInserted = readline('Insert coin: ');

    while (!array_key_exists($coinInserted, $wallet)) {
        $coinInserted = readline('Insert a valid coin: ');
    }

    while ($wallet[$coinInserted] < 1) {
        $coinInserted = readline('You don\'t have this type of coin. Insert something you have: ');
    }

    array_push($totalCoinsInserted, $coinInserted);
    $wallet[$coinInserted]--;
}

echo 'Enjoy your drink!' . PHP_EOL;
if ($change > 0) {
    echo 'Don\'t forget your change: ' . $change / 100 . PHP_EOL;
}

//add change to wallet according to denominations
foreach (array_reverse($wallet, true) as $denomination => $amount) {
    if ($denomination <= $change) {
        echo 'Returned coin: ' . $denomination . PHP_EOL;
        $wallet[$denomination]++;
        $change -= $denomination;
    }
}

echo 'A total of ' . countMoneyInWallet($wallet) / 100 . ' left in wallet after the purchase.';