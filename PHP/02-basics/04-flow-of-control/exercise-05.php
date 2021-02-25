<?php

//On your phone keypad, the alphabets are mapped to digits as follows: ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).
//Write a program called PhoneKeyPad, which prompts user for a String (case insensitive), and converts to a sequence of keypad digits.

$input = readline('Enter string...');

$inputArray = str_split(strtolower($input));

foreach ($inputArray as $character) {
    switch ($character) {
        case 'a':
        case 'b':
        case 'c':
            echo 2;
            break;
        case 'd':
        case 'e':
        case 'f':
            echo 3;
            break;
        case 'g':
        case 'h':
        case 'i':
            echo 4;
            break;
        case 'j':
        case 'k':
        case 'l':
            echo 5;
            break;
        case 'm':
        case 'n':
        case 'o':
            echo 6;
            break;
        case 'p':
        case 'q':
        case 'r':
        case 's':
            echo 7;
            break;
        case 't':
        case 'u':
        case 'v':
            echo 8;
            break;
        case 'w':
        case 'x':
        case 'y':
        case 'z':
            echo 9;
            break;
        default:
            echo $character;
    }
}

echo PHP_EOL;

$input = readline('Enter another string...');

for ($i = 0; $i < strlen($input); $i++) {
    if ($input[$i] === 'a' || $input[$i] === 'b' || $input[$i] === 'c') {
        echo 2;
    } else
        if ($input[$i] === 'd' || $input[$i] === 'e' || $input[$i] === 'f') {
            echo 3;
        } else
            if ($input[$i] === 'g' || $input[$i] === 'h' || $input[$i] === 'i') {
                echo 4;
            } else
                if ($input[$i] === 'j' || $input[$i] === 'k' || $input[$i] === 'l') {
                    echo 5;
                } else
                    if ($input[$i] === 'm' || $input[$i] === 'n' || $input[$i] === 'o') {
                        echo 6;
                    } else
                        if ($input[$i] === 'p' || $input[$i] === 'q' || $input[$i] === 'r' || $input[$i] === 's') {
                            echo 7;
                        } else
                            if ($input[$i] === 't' || $input[$i] === 'u' || $input[$i] === 'v') {
                                echo 8;
                            } else
                                if ($input[$i] === 'w' || $input[$i] === 'x' || $input[$i] === 'y' || $input[$i] === 'z') {
                                    echo 9;
                                } else {
                                    echo $input[$i];
                                }
}