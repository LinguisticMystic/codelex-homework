<?php

namespace App\Models;

class Person
{
    private string $fullName;
    private string $socialNumber;
    private ?string $description;

    public function __construct(
        string $fullName,
        string $socialNumber,
        ?string $description = null)
    {
        $this->fullName = $fullName;
        $this->description = $description;

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
}