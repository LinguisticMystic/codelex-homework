<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex, ?Dog $mother, ?Dog $father)
    {
        $this->name = $name;

        if ($sex === 'male' || $sex === 'female') {
            $this->sex = $sex;
        }

        $this->mother = $mother;
        $this->father = $father;
    }

    public function getFathersName(): string
    {
        if (is_null($this->father)) {
            return 'Unknown';
        } else {
            return $this->father->name;
        }
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        if ($this->mother->name === $dog->mother->name) {
            return true;
        } else {
            return false;
        }
    }

}

class DogTest
{
    private array $dogs = [];

    public function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function addDogs(array $dogs): void
    {
        foreach ($dogs as $dog) {
            $this->addDog($dog);
        }
    }

}

$kennel = new DogTest();

$kennel->addDogs([
    $molly = new Dog('Molly', 'female', null, null),
    $lady = new Dog('Lady', 'female', null, null),
    $sam = new Dog('Sam', 'male', null, null),
    $sparky = new Dog('Sparky', 'male', null, null),
    $rocky = new Dog('Rocky', 'male', $molly, $sam),
    $max = new Dog('Max', 'male', $lady, $rocky),
    $buster = new Dog('Buster', 'male', $lady, $sparky),
    $coco = new Dog('Coco', 'female', $molly, $buster),
]);

echo $molly->getFathersName() . PHP_EOL;
echo $coco->getFathersName() . PHP_EOL;

echo $coco->hasSameMotherAs($rocky) ? "True" : "False";