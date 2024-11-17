<?php

namespace App\classes;

class Truck extends BaseCar
{
    protected $extra;

    public function __construct($car_type, $brand, $photo_file_name, $carrying, $extra)
    {
        parent::__construct($car_type, $brand, $photo_file_name, $carrying);
        $this->extra = $extra;
    }

    //Геттер для доступа к защищенному свойству
    public function getExtra() {
        return $this->extra;
    }
}