<?php

class Buyer {
    public $name;
    public $licenses;
    public $funds;

    public function __construct($name, $licenses, $funds) {
        $this->name = $name;
        $this->licenses = $licenses;
        $this->funds = $funds;
    }
}

class Firearm {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$john = new Buyer('John', ['Glock 17', 'AR-15'], 2500);

$firearms = [
    $glock = new Firearm('Glock 17', 600),
    $beretta = new Firearm('Beretta 92', 800),
    $ar15 = new Firearm('AR-15', 1800),
    $heckler = new Firearm('Heckler & Koch G36', 505),
];

function checkEligibility(Firearm $requestedGun, array $availableGuns, Buyer $requester) {
    return in_array($requestedGun, $availableGuns) && in_array($requestedGun->name, $requester->licenses) && $requester->funds >= $requestedGun->price;
}

echo checkEligibility($ar15, $firearms, $john) ? "You can afford this firearm." : "You cannot afford this firearm.";