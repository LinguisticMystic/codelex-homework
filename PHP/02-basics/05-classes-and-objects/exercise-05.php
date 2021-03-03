<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function setMonth(int $monthNumber): void
    {
        $this->month = $monthNumber;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setDay(int $dayNumber): void
    {
        $this->day = $dayNumber;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setYear(int $yearNumber): void
    {
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
        do {
            $month = readline('Enter month: ');
        } while (!is_numeric($month) || $month > 0 || $month < 12);
        do {
            $day = readline('Enter day: ');
        } while (!is_numeric($day) || $day > 0);
        do {
            $year = readline('Enter year: ');
        } while (!is_numeric($year) || $year > 0);
        $date = new Date($month, $day, $year);
        echo $date->displayDate();
    }
}

$app = new DateTest();
$app->run();