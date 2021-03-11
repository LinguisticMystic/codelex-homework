<?php

class Car implements Movable
{
    private string $name;
    private int $crashRate;
    private int $minSpeed;
    private int $maxSpeed;
    private int $distanceTraveled = 0;
    private bool $hasStopped = false;
    private bool $hasCrashed = false;

    public function __construct(string $name, int $crashRate, int $minSpeed, int $maxSpeed)
    {
        $this->name = $name;
        $this->crashRate = $crashRate;
        $this->minSpeed = $minSpeed;
        $this->maxSpeed = $maxSpeed;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function increaseDistance(): void
    {
        if (!$this->hasStopped) {
            $this->distanceTraveled += rand($this->minSpeed, $this->maxSpeed);
        }
    }

    public function getDistanceTraveled(): int
    {
        return $this->distanceTraveled;
    }

    public function crash(): void
    {
        if ($this->hasStopped == false) {
            if (rand(1, 100) <= $this->crashRate) {
                $this->hasStopped = true;
                $this->hasCrashed = true;
            }
        }
    }

    public function stop(): void
    {
        $this->hasStopped = true;
    }

    public function hasStopped(): bool
    {
        return $this->hasStopped;
    }

    public function hasCrashed(): bool
    {
        return $this->hasCrashed;
    }

}