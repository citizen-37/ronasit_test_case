<?php

namespace App\Lib\OpenWeatherMap\DTO\Response;

class Main
{
    private float $temp;

    private int $pressure;

    private int $humidity;

    private float $tempMin;

    private float $tempMax;

    /**
     * @param float $temp
     * @return static
     */
    public function setTemp(float $temp)
    {
        $this->temp = $temp;

        return $this;
    }

    /**
     * @return float
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @param int $pressure
     * @return static
     */
    public function setPressure(int $pressure)
    {
        $this->pressure = $pressure;

        return $this;
    }

    /**
     * @return int
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param int $humidity
     * @return static
     */
    public function setHumidity(int $humidity)
    {
        $this->humidity = $humidity;

        return $this;
    }

    /**
     * @return int
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param float $tempMin
     * @return static
     */
    public function setTempMin(float $tempMin)
    {
        $this->tempMin = $tempMin;

        return $this;
    }

    /**
     * @return float
     */
    public function getTempMin()
    {
        return $this->tempMin;
    }

    /**
     * @param float $tempMax
     * @return static
     */
    public function setTempMax(float $tempMax)
    {
        $this->tempMax = $tempMax;

        return $this;
    }

    /**
     * @return float
     */
    public function getTempMax()
    {
        return $this->tempMax;
    }
}
