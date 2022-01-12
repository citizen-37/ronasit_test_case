<?php

namespace App\Lib\OpenWeatherMap\DTO\Response;

class Sys
{
    private int $type;

    private int $id;

    private float $message;

    private string $country;

    private int $sunrise;

    private int $sunset;

    /**
     * @param int $type
     * @return static
     */
    public function setType(int $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param float $message
     * @return static
     */
    public function setMessage(float $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return float
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $country
     * @return static
     */
    public function setCountry(string $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $sunrise
     * @return static
     */
    public function setSunrise(int $sunrise)
    {
        $this->sunrise = $sunrise;

        return $this;
    }

    /**
     * @return int
     */
    public function getSunrise()
    {
        return $this->sunrise;
    }

    /**
     * @param int $sunset
     * @return static
     */
    public function setSunset(int $sunset)
    {
        $this->sunset = $sunset;

        return $this;
    }

    /**
     * @return int
     */
    public function getSunset()
    {
        return $this->sunset;
    }
}
