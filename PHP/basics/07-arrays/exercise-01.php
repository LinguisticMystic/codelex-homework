<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
//print_r($numbers);
echo "Original numeric array: " . PHP_EOL;
foreach ($numbers as $index => $number) {
    echo "$index. $number" . PHP_EOL;
}

//todo
sort($numbers);
echo "Sorted numeric array: " . PHP_EOL;
foreach ($numbers as $index => $number) {
    echo "$index. $number" . PHP_EOL;
}

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: " . PHP_EOL;
foreach ($words as $index => $word) {
    echo "$index. $word" . PHP_EOL;
}

//todo
echo "Sorted string array: ";
sort($words);
foreach ($words as $index => $word) {
    echo "$index. $word" . PHP_EOL;
}