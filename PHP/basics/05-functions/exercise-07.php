<?php

//Imagine you own a gun store. Only certain guns can be purchased with license types.
//Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
//Guns are objects stored within an array.
//Each gun has license letter, price & name. Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = 'John';
$person->licenses = ['Glock 17', 'AR-15'];
$person->cash = 2500;

$glock = new stdClass();
$glock->name = 'Glock 17';
$glock->price = 600;

$beretta = new stdClass();
$beretta->name = 'Beretta 92';
$beretta->price = 800;

$ar15 = new stdClass();
$ar15->name = 'AR-15';
$ar15->price = 1800;

$heckler = new stdClass();
$heckler->name = 'Heckler & Koch G36';
$heckler->price = 505;

$guns = [$glock, $beretta, $ar15, $heckler];

function checkEligibility($requestedGun, $availableGuns, $requester) {
    if (in_array($requestedGun, $availableGuns) && in_array($requestedGun->name, $requester->licenses) && $requester->cash >= $requestedGun->price) {
        echo "You can buy $requestedGun->name.";
    } else {
        echo "You can't buy $requestedGun->name.";
    }
}

checkEligibility($ar15, $guns, $person);