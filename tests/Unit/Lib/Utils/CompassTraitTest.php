<?php

namespace Tests\Unit\Lib\Utils;

use App\Lib\Utils\CompassTrait;
use PHPUnit\Framework\TestCase;

class CompassTraitTest extends TestCase
{
    use CompassTrait;

    private $cases = [
        0 => 'north',
        22 => 'north',
        23 => 'north_east',
        45 => 'north_east',
        67 => 'north_east',
        70 => 'east',
        100 => 'east',
        359 => 'north',
        189 => 'south'
    ];

    public function testCompass()
    {
        foreach ($this->cases as $deg => $direction) {
            $this->assertEquals(
                $direction,
                $this->degreesToDirection($deg),
                sprintf("%d degrees should be %s direction", $deg, $direction)
            );
        }
    }
}
