<?php

//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.

class Person
{
    public string $name;
    public string $surname;
    public int $age;
    public string $birthday;

    public function __construct(string $name, string $surname, int $age, string $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
    }
}

$persons = [
    'anna' => $myFriend = new Person('Anna', 'Dzērve', 24, '19 May, 1995'),
    'jesus' => $myHero = new Person('Jesus', 'of Nazareth', 33, '24 December, 0'),
    'janis' => $myNeighbor = new Person('Jānis','Bērziņš', 35, '14 June, 1985'),
];

foreach ($persons as $person) {
    echo "Name: $person->name $person->surname, Age: $person->age, Birthday: $person->birthday." . PHP_EOL;
};