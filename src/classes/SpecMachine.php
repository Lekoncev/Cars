<?php

namespace App\classes;

use Exception;

class SpecMachine extends BaseCar
{
    protected $body_whl;

    public function __construct($car_type, $brand, $photo_file_name, $carrying , $body_whl)
    {
        parent::__construct($car_type, $brand, $photo_file_name, $carrying);
        $this->body_whl = $body_whl;
    }

    // Геттер для доступа к защищенному свойству
    public function getBodyWhl() {
        return $this->body_whl;
    }

    // Метод для получения объема кузова в метрах (кубических).
    public function getBodyVolume() {
        try {
            if (count($this->body_whl) === 3) {
                // Объем = ширина * высота * длина
                return $this->body_whl[0] * $this->body_whl[1] * $this->body_whl[2];
            }
            throw new Exception("Incorrect body");
        } catch (Exception $e) {
            // Логируем ошибку и возвращаем null
            error_log("Error calculating BodyVolume: " . $e->getMessage());
            return 'Null';
        }
    }
}