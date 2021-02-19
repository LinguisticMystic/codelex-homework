<?php

//Design a Geometry class with the following methods:
//
//    A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//        Area = π * r * 2
//        Use Math.PI for π and r for the radius of the circle
//    A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
//        Area = Length x Width
//    A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
//        Area = Base x Height x 0.5
//
//The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.
//
//Next write a program to test the class, which displays the following menu and responds to the user’s selection:
//
//Geometry calculator:
//
//Calculate the Area of a Circle
//Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit
//Enter your choice (1-4):
//
//Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.

class Geometry
{
    static function circleArea(int $radius): float
    {
        return pi() * $radius * 2;
    }

    static function rectangleArea(int $length, int $width): float
    {
        return $length * $width;
    }

    static function triangleArea(int $baselength, int $height): float
    {
        return $baselength * $height * 0.5;
    }
}

echo "GEOMETRY CALCULATOR\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";
echo "Enter your choice (1-4): ";

$choice = readline();

while ($choice < 1 || $choice > 4) {
    echo 'Invalid choice. ';
    $choice = readline('Try again.');
}

if ($choice == 1) {
    $radius = readline('Enter circle radius...');
    if ($radius < 0) {
        echo 'Negative numbers not allowed.';
    } else {
        echo sprintf('The area of the circle is %.2f', Geometry::circleArea($radius));
    }
}

if ($choice == 2) {
    $length = readline('Enter rectangle length...');
    $width = readline('Enter rectangle width...');
    if ($length < 0 || $width < 0) {
        echo 'Negative numbers not allowed.';
    } else {
        echo 'The area of the rectangle is ' . Geometry::rectangleArea($length, $width);
    }
}

if ($choice == 3) {
    $baselength = readline('Enter triangle base length...');
    $height = readline('Enter triangle height...');
    if ($baselength < 0 || $height < 0) {
        echo 'Negative numbers not allowed.';
    } else {
        echo 'The area of the triangle is ' . Geometry::triangleArea($baselength, $height);
    }
}

if ($choice == 4) {
    echo 'Bye!';
}