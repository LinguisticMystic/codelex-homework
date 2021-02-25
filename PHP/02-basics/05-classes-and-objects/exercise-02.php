<?php

//Write a method named swap_points that accepts two Points as parameters and swaps their x/y values.

class Point
{
    private int $x;
    private int $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function swapPoints(Point $p1, Point $p2): void
    {
        $p1XCoordinate = $p1->getXCoordinate();
        $p1YCoordinate = $p1->getYCoordinate();

        $p1->setXCoordinate($p2->getXCoordinate());
        $p1->setYCoordinate($p2->getYCoordinate());

        $p2->setXCoordinate($p1XCoordinate);
        $p2->setYCoordinate($p1YCoordinate);
    }

    function getXCoordinate(): int
    {
        return $this->x;
    }

    function getYCoordinate(): int
    {
        return $this->y;
    }

    function setXCoordinate(int $coordinate): void
    {
        $this->x = $coordinate;
    }

    function setYCoordinate(int $coordinate): void
    {
        $this->y = $coordinate;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "Point 1 coordinates ({$p1->getXCoordinate()}, {$p1->getYCoordinate()})" . PHP_EOL;
echo "Point 2 coordinates ({$p2->getXCoordinate()}, {$p2->getYCoordinate()})" . PHP_EOL;

$p1->swapPoints($p1, $p2);

echo "After swap:" . PHP_EOL;
echo "Point 1 coordinates ({$p1->getXCoordinate()}, {$p1->getYCoordinate()})" . PHP_EOL;
echo "Point 2 coordinates ({$p2->getXCoordinate()}, {$p2->getYCoordinate()})" . PHP_EOL;
