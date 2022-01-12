<?php

namespace App\Lib\OpenWeatherMap\DTO\Request;

use App\Lib\OpenWeatherMap\DTO\Common\Point;

class RequestByCoords extends Request
{

    private Point $point;

    /**
     * @param Point $point
     * @return static
     */
    public function setPoint(Point $point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * @return Point
     */
    public function getPoint()
    {
        return $this->point;
    }
}
