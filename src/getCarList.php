<?php

namespace App;

use App\classes\Car;
use App\classes\SpecMachine;
use App\classes\Truck;
use Exception;

function getCarList($filename) {
    $vehicles = [];

    if (($res = fopen($filename , 'r')) !== false) {
        // Пропускаем заголовки
        fgetcsv($res, 1000, ",");
        while (($data = fgetcsv($res, 1000, ";")) !== false) {
            // Проверяем количество колонок
            if (count($data) < 6) {
                continue;
            }

            $car_type = $data[0];
            $brand = $data[1];
            $passenger_seats_count = isset($data[2]) ? (int)$data[2] : null;
            $photo_file_name = $data[3];
            $body_whl = isset($data[4]) ? explode('x', $data[4]) : null; // Разделяем на ширину и высоту
            $carrying = isset($data[5]) ? (float)$data[5] : null;
            $extra = isset($data[6]) ? $data[6] : null;

            // Преобразуем размеры кузова в float
            if ($body_whl !== null && count($body_whl) === 3) {
                $body_whl = array_map('floatval', $body_whl);
            }

            try {
                // Создаем объект в зависимости от типа автомобиля
                if ($car_type === 'car') {
                    $vehicles[] = new Car($car_type, $brand, $photo_file_name, $carrying, $passenger_seats_count);
                } elseif ($car_type === 'truck') {
                    $vehicles[] = new SpecMachine($car_type, $brand, $photo_file_name, $carrying, $body_whl);
                } elseif ($car_type === 'spec_machine') {
                    $vehicles[] = new Truck($car_type, $brand, $photo_file_name, $carrying, $extra);
                } else {
                    throw new Exception("Unknown type: $car_type");
                }
            } catch (Exception $e) {
                // Обрабатываем исключения, если возникли проблемы с созданием объекта
                error_log("Error creating object: " . $e->getMessage());
            }
        }
        fclose($res);
    }
    return $vehicles;

}
