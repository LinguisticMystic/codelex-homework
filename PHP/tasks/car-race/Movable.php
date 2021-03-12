<?php

Interface Movable
{
    public function getName(): string;
    public function increaseDistance(): void;
    public function getDistanceTraveled(): int;
    public function crash(): void;
    public function stop(): void;
    public function hasStopped(): bool;
    public function hasCrashed(): bool;
}