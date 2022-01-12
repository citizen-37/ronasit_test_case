<?php

namespace App\Lib\OpenWeatherMap\Factory;

use App\Lib\OpenWeatherMap\DTO\Request\RequestByCoords;
use App\Lib\OpenWeatherMap\DTO\Request\RequestById;

interface RequestFactoryInterface
{
    /**
     * @param string $id
     * @param string $units
     * @param string $language
     * @return RequestById
     */
    public function createWithId(string $id, string $units, string $language): RequestById;

    /**
     * @param string $lat
     * @param string $lon
     * @param string $units
     * @param string $language
     * @return RequestByCoords
     */
    public function createWithCoords(string $lat, string $lon, string $units, string $language): RequestByCoords;
}
