<?php

require_once 'InventoryInterface.php';
require_once 'suppliers/Courier.php';
require_once 'suppliers/GardenShack.php';
require_once 'suppliers/Warehouse.php';
require_once 'Flower.php';
require_once 'FlowerCollection.php';
require_once 'Shop.php';

$myShop = new Shop('Feminist Flower Shop');

$myShop->createInventory($shopInventory = new FlowerCollection());
$shopInventory->addFlowerArray([
    new Flower('tulip', 20),
    new Flower('rose', 0),
    new Flower('carnation', 0)
]);

$myShop->setPrice('tulip', 80);
$myShop->setPrice('rose', 160);
$myShop->setPrice('carnation', 95);

$myShop->addSupplier($supplierOne = new Warehouse());
$myShop->addSupplier($supplierTwo = new GardenShack());
$myShop->addSupplier($supplierThree = new Courier());

$supplierOne->setFlowerCollection($firstBatch = new FlowerCollection());
$firstBatch->addFlowerArray([
    new Flower('tulip', 200),
    new Flower('rose', 140),
    new Flower('carnation', 260),
    new Flower('poisonous mushroom', 1)
]);

$supplierTwo->addFlower('rose', 100);
$supplierTwo->addFlower('tulip', 200);
$supplierTwo->addFlower('old sock', 1);

$supplierThree->takeFlowers('carnation', 20);

function printShopAssortment(Shop $shop): void
{
    foreach ($shop->getInventory()->getFlowers() as $item) {
        echo "Item: {$item->getName()} | Amount: {$item->getAmount()} | Price: €";
        foreach ($shop->getPrices() as $flower => $price) {
            if ($flower === $item->getName()) {
                echo number_format($price / 100, 2);
            }
        }
        echo PHP_EOL;
    }
}

echo 'Shop inventory before shipment:' . PHP_EOL;
printShopAssortment($myShop);

$myShop->mergeShipmentWithInventory($supplierOne->shipment());
$myShop->mergeShipmentWithInventory($supplierTwo->shipment());
$myShop->mergeShipmentWithInventory($supplierThree->shipment());

echo PHP_EOL . 'Shop inventory after shipment and merge:' . PHP_EOL;
printShopAssortment($myShop);

echo PHP_EOL;

$gender = readline('What is your gender (all genders welcome) ?...');
$choiceFlower = readline('Enter the name of the flower to buy...');

if (!in_array($choiceFlower, $myShop->getInventory()->getAllFlowerNames())) {
    exit('No such item in shop');
}

do {
    $choiceAmount = readline('Enter amount...');
} while (!filter_var($choiceAmount, FILTER_VALIDATE_INT));

$myShop->removeFromInventory($choiceFlower, $choiceAmount);
$cost = $myShop->getPrices()[$choiceFlower];

echo PHP_EOL . 'YOU HAVE TO PAY €';
if ($gender === 'female') {
    echo number_format(($cost - ($cost * 20 / 100)) / 100 * $choiceAmount, 2);
} else {
    echo number_format($cost / 100 * $choiceAmount, 2);
}

echo PHP_EOL;
echo PHP_EOL . 'Shop inventory after purchase:' . PHP_EOL;
printShopAssortment($myShop);
