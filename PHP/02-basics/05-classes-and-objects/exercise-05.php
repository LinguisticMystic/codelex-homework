<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function setMonth(int $monthNumber): void
    {
        if ($monthNumber < 0 || $monthNumber > 12) {
            throw new InvalidArgumentException('Not a valid month');
        }
        $this->month = $monthNumber;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setDay(int $dayNumber): void
    {
        if ($dayNumber < 0) {
            throw new InvalidArgumentException('Day cannot be negative');
        }
        $this->day = $dayNumber;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setYear(int $yearNumber): void
    {
        if ($yearNumber < 0) {
            throw new InvalidArgumentException('Year cannot be negative');
        }
        $this->year = $yearNumber;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        return "$this->month/$this->day/$this->year";
    }
}

class DateTest
{
    function run()
    {
        $date = new Date();

        do {
            $month = readline('Enter month: ');
        } while (!filter_var($month, FILTER_VALIDATE_INT));

        do {
            $day = readline('Enter day: ');
        } while (!filter_var($day, FILTER_VALIDATE_INT));

        do {
            $year = readline('Enter year: ');
        } while (!filter_var($year, FILTER_VALIDATE_INT));

        try {
            $date->setMonth($month);
        } catch (InvalidArgumentException $e) {
            var_dump($e->getMessage());
        }

        try {
            $date->setDay($day);
        } catch (InvalidArgumentException $e) {
            var_dump($e->getMessage());
        }

        try {
            $date->setYear($year);
        } catch (InvalidArgumentException $e) {
            var_dump($e->getMessage());
        }

        echo $date->displayDate();
    }
}

$app = new DateTest();
$app->run();