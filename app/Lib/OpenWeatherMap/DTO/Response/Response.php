<?php

namespace App\Lib\OpenWeatherMap\DTO\Response;

use App\Lib\OpenWeatherMap\DTO\Common\Point;

class Response
{
    private Point $coord;

    /**
     * @var Weather[]
     */
    private array $weather;

    private Main $main;

    private Wind $wind;

    private Clouds $clouds;

    private Sys $sys;

    private int $id;

    private int $dt;

    private int $visibility;

    private int $cod;

    private string $base;

    private string $name;

    /**
     * @param Point $coord
     * @return static
     */
    public function setCoord(Point $coord)
    {
        $this->coord = $coord;

        return $this;
    }

    /**
     * @return Point
     */
    public function getCoord()
    {
        return $this->coord;
    }

    /**
     * @param Weather[] $weather
     * @return static
     */
    public function setWeather(array $weather)
    {
        $this->weather = $weather;

        return $this;
    }

    /**
     * @return Weather[]
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @param string $base
     * @return static
     */
    public function setBase(string $base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param Main $main
     * @return static
     */
    public function setMain(Main $main)
    {
        $this->main = $main;

        return $this;
    }

    /**
     * @return Main
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @param int $visibility
     * @return static
     */
    public function setVisibility(int $visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * @return int
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param Wind $wind
     * @return static
     */
    public function setWind(Wind $wind)
    {
        $this->wind = $wind;

        return $this;
    }

    /**
     * @return Wind
     */
    public function getWind()
    {
        return $this->wind;
    }

    /**
     * @param Clouds $clouds
     * @return static
     */
    public function setClouds(Clouds $clouds)
    {
        $this->clouds = $clouds;

        return $this;
    }

    /**
     * @return Clouds
     */
    public function getClouds()
    {
        return $this->clouds;
    }

    /**
     * @param int $dt
     * @return static
     */
    public function setDt(int $dt)
    {
        $this->dt = $dt;

        return $this;
    }

    /**
     * @return int
     */
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * @param Sys $sys
     * @return static
     */
    public function setSys(Sys $sys)
    {
        $this->sys = $sys;

        return $this;
    }

    /**
     * @return Sys
     */
    public function getSys()
    {
        return $this->sys;
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
     * @param string $name
     * @return static
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $cod
     * @return static
     */
    public function setCod(int $cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * @return int
     */
    public function getCod()
    {
        return $this->cod;
    }
}
