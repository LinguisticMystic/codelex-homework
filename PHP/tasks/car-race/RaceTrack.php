<?php

class RaceTrack
{
    private array $track = [];

    public function getTrack(): array
    {
        return $this->track;
    }

    public function addLanes(Race $race, int $laneLength)
    {
        for ($i = 0; $i < count($race->getParticipants()); $i++) {
            $this->addLane(new Lane($laneLength));
        }
    }

    private function addLane(Lane $lane)
    {
        $this->track[] = $lane;
    }

}