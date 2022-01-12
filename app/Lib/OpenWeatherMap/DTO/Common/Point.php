<?php

namespace App\Lib\OpenWeatherMap\DTO\Common;

class Point
{
    private float $lat;
    private float $lon;

    /**
     * @param float $lat
     * @return static
     */
    public function setLat(float $lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lon
     * @return static
     */
    public function setLon(float $lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }
}
