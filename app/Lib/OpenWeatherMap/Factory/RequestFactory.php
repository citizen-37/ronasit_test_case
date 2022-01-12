<?php

namespace App\Lib\OpenWeatherMap\Factory;

use App\Lib\OpenWeatherMap\DTO\Common\Point;
use App\Lib\OpenWeatherMap\DTO\Request\RequestByCoords;
use App\Lib\OpenWeatherMap\DTO\Request\RequestById;

class RequestFactory implements RequestFactoryInterface
{
    private string $appId;

    /**
     * @param string $appId
     */
    public function __construct(string $appId)
    {
        $this->appId = $appId;
    }

    /**
     * @inheritdoc
     */
    public function createWithId(string $id, string $units, string $language): RequestById
    {
        return
            (new RequestById())
                ->setAppid($this->appId)
                ->setId($id)
                ->setUnits($units)
                ->setLanguage($language)
        ;
    }

    /**
     * @inheritdoc
     */
    public function createWithCoords(string $lat, string $lon, string $units, string $language): RequestByCoords
    {
        return
            (new RequestByCoords())
                ->setAppid($this->appId)
                ->setPoint($this->createPoint($lat, $lon))
                ->setUnits($units)
                ->setLanguage($language)
        ;
    }

    /**
     * @param string $lat
     * @param string $lon
     * @return Point
     */
    private function createPoint(string $lat, string $lon): Point
    {
        return
            (new Point())
                ->setLat($lat)
                ->setLon($lon)
        ;
    }
}
