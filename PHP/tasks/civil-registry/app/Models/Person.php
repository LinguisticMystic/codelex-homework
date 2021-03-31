<?php

namespace App\Models;

class Person
{
    private string $fullName;
    private string $socialNumber;
    private ?string $description;
    private int $age;
    private string $address;

    public function __construct(
        string $fullName,
        string $socialNumber,
        ?string $description = null,
        int $age,
        string $address)
    {
        $this->fullName = $fullName;
        $this->description = $description;
        $this->age = $age;
        $this->address = $address;

        if (preg_match('/^[0-9-]+$/', $socialNumber)) {

            $numberWithoutHyphen = str_replace("-", "", $socialNumber);

            if (strlen($numberWithoutHyphen) > 11) {
                throw new \InvalidArgumentException('Social number must contain 11 digits with or without a hyphen.');
            } else {
                $this->socialNumber = $numberWithoutHyphen;
            }
        }

    }

    public function name(): string
    {
        return $this->fullName;
    }

    public function socialNumber(): string
    {
        return $this->socialNumber;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function address(): string
    {
        return $this->address;
    }
}