<?php

//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

class Person
{
    public string $name;
    public string $surname;
    public int $age;

    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;

    }

    public function isOfAge(): bool
    {
        return $this->age >= 18;
    }
}

$people = [
    new Person('John', 'Doe', 30),
    new Person('Mary', 'Wood', 28),
    new Person('Billy', 'Smith', 12)
];

foreach ($people as $person) { //foreach ($people as $key => $value)
    if ($person->isOfAge()) {
        echo "{$person->name} has reached the age of 18. \n";
    } else {
        echo "{$person->name} is underaged. \n";
    }
}