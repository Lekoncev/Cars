<?php

namespace App;

use App\classes\SpecMachine;
use App\classes\Car;
use App\classes\Truck;

require '../vendor/autoload.php';
require '../src/getCarList.php';

 //Пример использования
$vehicles = getCarList('table_cars.csv');
foreach ($vehicles as $vehicle) {
    echo "Brand: {$vehicle->getBrand()}, Type: {$vehicle->getCarType()}, Format images: {$vehicle->getPhotoFileExt()}\n" . '<br>';
    if ($vehicle instanceof SpecMachine) {
        echo "Body Volume: " . $vehicle->getBodyVolume() . "\n" . '<hr>' .  '<br>';
    } elseif ($vehicle instanceof Truck) {
        echo "Extra: " . $vehicle->getExtra() . "\n" . '<hr>' . '<br>';
    } elseif ($vehicle instanceof Car) {
        echo "Passenger_seats_count: " . $vehicle->getPassengerSeatsCount() . "\n" . '<hr>' . '<br>';
    }
}
