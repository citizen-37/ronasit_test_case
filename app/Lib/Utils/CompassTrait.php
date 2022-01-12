<?php

namespace App\Lib\Utils;

trait CompassTrait
{
    private int $step = 45;

    private array $directions = [
        'north',
        'north_east',
        'east',
        'south_east',
        'south',
        'south_west',
        'west',
        'north_west',
    ];

    /**
     * @param int $deg
     * @return string
     */
    protected function degreesToDirection(int $deg): string
    {
        $deg %= 360;

        $deg = $this->shiftCoordinateSystem($deg);

        $index = (int) ($deg / $this->step);

        return $this->directions[$index];
    }

    /**
     * @param int $deg
     * @return int
     */
    private function shiftCoordinateSystem(int $deg): int
    {
        $deg += ($this->step/2);

        if ($deg > 360) {
            $deg -= 360;
        }

        return $deg;
    }
}
