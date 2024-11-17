<?php

namespace App\classes;

class BaseCar {
    protected $car_type;
    protected $brand;
    protected $photo_file_name;
    protected $carrying;

    public function __construct($car_type, $brand, $photo_file_name, $carrying) {
        $this->car_type = $car_type;
        $this->brand = $brand;
        $this->photo_file_name = $photo_file_name;
        $this->carrying = $carrying;
    }

    // Геттеры для доступа к защищенным свойствам
    public function getCarType() {
        return $this->car_type;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getCarrying() {
        return $this->carrying;
    }

    // Метод для получения расширения файла фотографии
    public function getPhotoFileExt() {
        return pathinfo($this->photo_file_name, PATHINFO_EXTENSION);
    }
}
