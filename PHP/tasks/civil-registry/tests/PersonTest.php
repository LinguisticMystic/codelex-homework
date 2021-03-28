<?php

namespace Tests;

use App\Models\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testName()
    {
        $person = new Person('John Doe', '123456-12345');
        $this->assertEquals('John Doe', $person->name());
    }

    public function testSocialNumber()
    {
        $person = new Person('John Doe', '123456-12345');
        $this->assertEquals('12345612345', $person->socialNumber());
    }

    public function testDescription()
    {
        $person = new Person('John Doe', '123456-12345', 'trustworthy citizen');
        $this->assertEquals('trustworthy citizen', $person->description());
    }
}