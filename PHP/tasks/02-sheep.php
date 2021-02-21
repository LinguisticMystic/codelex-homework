<?php

//sheep - happy
//wolf - hehe
//omg - if wolf next to sheep

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep'];

for ($i = 0; $i < count($animals); $i++) {
    if ($animals[$i] === 'wolf') {
        echo 'HEHE' . PHP_EOL;
        continue;
    }
    if (isset($animals[$i - 1]) && $animals[$i - 1] === 'wolf' || isset($animals[$i + 1]) && $animals[$i + 1] === 'wolf') {
        echo 'OMG' .PHP_EOL;
        continue;
    }
    echo 'Happy' .PHP_EOL;
}