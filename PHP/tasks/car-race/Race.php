<?php

class Race
{
    private array $participants = [];
    private int $timeElapsed = 0;
    private array $finalists = [];

    public function addParticipant(Movable $participant)
    {
        $this->participants[] = $participant;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getTime(): int
    {
        return $this->timeElapsed;
    }

    public function incrementTime(): void
    {
        $this->timeElapsed++;
    }

    public function recordFinalists(Lane $lane): void
    {
        $laneCells = $lane->getCells();

        if ($lane->checkIfReachedFinish() && !array_key_exists(end($laneCells), $this->finalists)) {
            $this->finalists[end($laneCells)] = $this->timeElapsed;
        }
    }

    public function getFinalists(): array
    {
        return $this->finalists;
    }

}