<?php

class Lane
{
    private array $cells = [];

    public function __construct(int $length)
    {
        for ($i = 0; $i < $length; $i++) {
            $this->cells[] = 'empty';
        }
    }

    public function getCells(): array
    {
        return $this->cells;
    }

    public function rewriteVehiclePosition(Movable $participant, int $distanceTraveled)
    {
        for ($i = 0; $i < count($this->cells); $i++) {
            $this->cells[$i] = 'empty';
        }

        if (!isset($this->cells[$distanceTraveled])) {
            array_splice($this->cells, -1, 1, $participant->getName());
            $participant->stop();
        } else {
            $this->cells[$distanceTraveled] = $participant;
        }
    }

    public function checkIfReachedFinish(): bool
    {
        return array_slice($this->getCells(), -1)[0] !== 'empty';
    }

}