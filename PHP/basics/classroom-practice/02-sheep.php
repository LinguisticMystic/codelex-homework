<?php

//sheep - happy
//wolf - hehe
//omg - if wolf next to sheep

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep'];

for ($i = 0; $i < count($animals); $i++) {
    if ($animals[$i] == 'sheep' && $animals[$i + 1] == 'sheep' && $animals[$i - 1] == 'sheep') {
        echo 'Happy' . PHP_EOL;
    }
    if ($animals[$i] == 'sheep' && $animals[$i + 1] == 'wolf' || $animals[$i - 1] == 'wolf') {
        echo 'OMG' . PHP_EOL;
    }
    if ($animals[$i] == 'wolf') {
        echo 'HEHE' . PHP_EOL;
    }
}