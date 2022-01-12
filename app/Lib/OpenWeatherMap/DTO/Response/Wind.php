<?php

namespace App\Lib\OpenWeatherMap\DTO\Response;

class Wind
{
    private float $speed;
    private int $deg;

    /**
     * @param float $speed
     * @return static
     */
    public function setSpeed(float $speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return float
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param int $deg
     * @return static
     */
    public function setDeg(int $deg)
    {
        $this->deg = $deg;

        return $this;
    }

    /**
     * @return int
     */
    public function getDeg()
    {
        return $this->deg;
    }
}
