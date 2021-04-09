<?php

namespace App\Models;

use OTPHP\TOTP;

class Token
{
    private int $id;
    private string $key;
    private int $time;

    public function __construct(int $id)
    {
        $otp = TOTP::create();

        $this->id = $id;
        $this->key = $otp->getSecret();
        $this->time = time() + 900;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function time(): int
    {
        return $this->time;
    }
}