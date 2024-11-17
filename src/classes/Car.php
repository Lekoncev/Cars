<?php

namespace App\classes;

class Car extends BaseCar {

    protected $passenger_seats_count;

    public function __construct($car_type, $brand, $photo_file_name, $carrying, $passenger_seats_count)
    {
        parent::__construct($car_type, $brand, $photo_file_name, $carrying);
        $this->passenger_seats_count = $passenger_seats_count;
    }

    // Геттер для доступа к защищенному свойству
    public function getPassengerSeatsCount() {
        return $this->passenger_seats_count;
    }
}