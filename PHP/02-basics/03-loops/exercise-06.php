<?php

//Write a console program in a class named AsciiFigure that draws a figure of the following form, using for loops.
//
//////////////////\\\\\\\\\\\\\\\\
//////////////********\\\\\\\\\\\\
//////////****************\\\\\\\\
//////************************\\\\
//********************************

//Then, modify your program using an integer class constant so that it can create a similar figure of any size. For instance, the diagram above has a size of 5.
//For example, the figure below has a size of 3:
//
// ////////\\\\\\\\
// ////********\\\\
// ****************
//
//And the figure below has a size of 7:
//
// ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\
// ////////////////////********\\\\\\\\\\\\\\\\\\\\
// ////////////////****************\\\\\\\\\\\\\\\\
// ////////////************************\\\\\\\\\\\\
// ////////********************************\\\\\\\\
// ////****************************************\\\\
// ************************************************

class AsciiFigure
{
    const ROWS = 5;

    public function drawShape(): string
    {
        $rows = [];
        $asteriskBlock = '****';
        $leftBlock = '////';
        $rightBlock = '\\\\\\\\';
        $blockCount = 0;
        $asteriskCount = 0;

        for ($i = 0; $i < self::ROWS; $i++) {
            $rows[] = str_repeat($leftBlock, (self::ROWS - $blockCount - 1));
            $rows[] = str_repeat($asteriskBlock, ($asteriskCount));
            $rows[] = str_repeat($rightBlock, (self::ROWS - $blockCount - 1));
            $rows[] = PHP_EOL;
            $blockCount++;
            $asteriskCount+=2;
        }
        return implode('', $rows);
    }
}

$pyramid = new AsciiFigure();

echo $pyramid->drawShape();