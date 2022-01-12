<?php

namespace App\Lib\OpenWeatherMap\DTO\Request;

class RequestById extends Request
{
    private int $id;

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
}
