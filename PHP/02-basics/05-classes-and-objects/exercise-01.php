<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "$this->name, $this->price, $this->amount";
    }

    public function changeQuantity(int $newAmount): void
    {
        $this->amount = $newAmount;
    }

    public function changePrice(float $newPrice): void
    {
        $this->price = $newPrice;
    }

}

$mouse = new Product('Logitech mouse', 70.00, 14);
$iPhone = new Product('iPhone 5s', 999.99, 3);
$projector = new Product('Epson EB-U05', 440.46, 1);

echo $mouse->printProduct() . PHP_EOL;
echo $iPhone->printProduct() . PHP_EOL;
echo $projector->printProduct() . PHP_EOL;

$mouse->changeQuantity(6);
$iPhone->changePrice(666.66);

echo $mouse->printProduct() . PHP_EOL;
echo $iPhone->printProduct() . PHP_EOL;
echo $projector->printProduct() . PHP_EOL;