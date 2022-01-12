<?php

namespace App\Lib\OpenWeatherMap\DTO\Request;

class Request
{
    private string $appid;
    private string $units;
    private string $language;

    /**
     * @param string $appid
     * @return static
     */
    public function setAppid(string $appid)
    {
        $this->appid = $appid;

        return $this;
    }

    /**
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param string $units
     * @return static
     */
    public function setUnits(string $units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param string $language
     * @return static
     */
    public function setLanguage(string $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
