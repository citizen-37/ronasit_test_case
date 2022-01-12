<?php

namespace App\Lib\OpenWeatherMap\DTO\Response;

class Clouds
{
    private int $all;

    /**
     * @param int $all
     * @return static
     */
    public function setAll(int $all)
    {
        $this->all = $all;

        return $this;
    }

    /**
     * @return int
     */
    public function getAll()
    {
        return $this->all;
    }
}
