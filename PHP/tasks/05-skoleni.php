<?php

class Student
{
    private string $name;
    private int $age;
    private int $groupNumber;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        $this->assignClassNumber($age);
    }

    public function assignClassNumber(int $age): void
    {
        switch ($age) {
            case 7:
            case 8:
                $this->groupNumber = 1;
                break;
            case 9:
            case 10:
                $this->groupNumber = 2;
                break;
            case 11:
            case 12:
                $this->groupNumber = 3;
                break;
            case 13:
            case 14:
                $this->groupNumber = 4;
                break;
            case 15:
            case 16:
                $this->groupNumber = 5;
                break;
            case 17:
            case 18:
                $this->groupNumber = 6;
                break;
            default:
                $this->groupNumber = 0;
        }
    }

    public function changeGroupNumber(int $number): void
    {
        $this->groupNumber = $number;
    }

    public function printStudentInfo(): string
    {
        return "$this->name, $this->age gadi, mācās $this->groupNumber. grupā.";
    }

    public function getGroupNumber(): int
    {
        return $this->groupNumber;
    }

}

$students = [
    $lauris = new Student('Lauris', 7),
    $rolands = new Student('Lauris', 8),
    $sofija = new Student('Sofija', 12),
    $anna = new Student('Anna', 17)
];

class School
{
    private array $studentBody;

    public function __construct(array $studentBody)
    {
        $this->studentBody = $studentBody;
    }

    public function numberOfStudentsInGroup(int $groupNumber): int
    {
        $count = 0;
        foreach ($this->studentBody as $student) {
            if ($student->getGroupNumber() === $groupNumber) {
                $count++;
            }
        }
        return $count;
    }
}

$hogwarts = new School($students);

echo $hogwarts->numberOfStudentsInGroup(1);


$lauris->changeGroupNumber(4);

echo PHP_EOL;
echo $lauris->printStudentInfo();