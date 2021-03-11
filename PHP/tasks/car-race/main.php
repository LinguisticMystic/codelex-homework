<?php

require_once 'Movable.php';
require_once 'Lane.php';
require_once 'RaceTrack.php';
require_once 'Race.php';
require_once 'Car.php';
require_once 'Bike.php';

$proRace = new Race();
$proRace->addParticipant(new Car('BMW', 5,2, 5));
$proRace->addParticipant(new Car('Mitsubishi', 2, 4, 6));
$proRace->addParticipant(new Bike('Grandpa\'s wartime motorcycle', true, 20, 2, 3));
//$proRace->addParticipant(new Bike('Suzuki', false, 0, 3, 7));

$fieryHighway = new RaceTrack();
$fieryHighway->addLanes($proRace, 20);

while (true) {
    $stoppedVehicles = 0;

    for ($i = 0; $i < count($fieryHighway->getTrack()); $i++) {
        $fieryHighway->getTrack()[$i]->rewriteVehiclePosition($proRace->getParticipants()[$i], $proRace->getParticipants()[$i]->getDistanceTraveled());
        $proRace->getParticipants()[$i]->crash();
        $proRace->getParticipants()[$i]->increaseDistance();
        if ($proRace->getParticipants()[$i]->hasStopped()) {
            $stoppedVehicles+=1;
        }
        $proRace->recordFinalists($fieryHighway->getTrack()[$i]);
    }

    print("\033[2J\033[;H");
    echo 'Time elapsed: ' . $proRace->getTime() . PHP_EOL;

    for ($i = 0; $i < count($proRace->getParticipants()); $i++) {
        foreach ($fieryHighway->getTrack()[$i]->getCells() as $cell) {
            if ($cell == 'empty') {
                echo '*';
            } else {
                echo $proRace->getParticipants()[$i]->getName()[0];
            }
        }
        echo PHP_EOL;
    }

    echo PHP_EOL . 'Finalists: ' . PHP_EOL;
    foreach ($proRace->getFinalists() as $key => $seconds) {
        echo array_search($key, array_keys($proRace->getFinalists())) . " $key finished in $seconds seconds" . PHP_EOL;
    }

    echo PHP_EOL . 'Crashers: ' . PHP_EOL;
    foreach ($proRace->getParticipants() as $participant) {
        if ($participant->hasCrashed()) {
            echo "{$participant->getName()} has crashed" . PHP_EOL;
        }
    }

    $proRace->incrementTime();

    if ($stoppedVehicles === count($proRace->getParticipants())) {
        exit();
    }

    sleep(1);
}
