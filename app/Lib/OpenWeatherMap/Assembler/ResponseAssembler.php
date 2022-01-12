<?php

namespace App\Lib\OpenWeatherMap\Assembler;

use App\Lib\OpenWeatherMap\DTO\Response\Clouds;
use App\Lib\OpenWeatherMap\DTO\Common\Point;
use App\Lib\OpenWeatherMap\DTO\Response\Main;
use App\Lib\OpenWeatherMap\DTO\Response\Sys;
use App\Lib\OpenWeatherMap\DTO\Response\Weather;
use App\Lib\OpenWeatherMap\DTO\Response\Wind;
use App\Lib\OpenWeatherMap\DTO\Response\Response;

class ResponseAssembler implements ResponseAssemblerInterface
{
    /**
     * @inheritdoc
     */
    public function assemble($data): Response
    {
        return
            (new Response())
                ->setId($data['id'])
                ->setDt($data['dt'])
                ->setVisibility($data['visibility'])
                ->setCod($data['cod'])
                ->setBase($data['base'])
                ->setName($data['name'])
                ->setCoord($this->assembleCoord($data['coord']))
                ->setWeather($this->assembleWeather($data['weather']))
                ->setMain($this->assembleMain($data['main']))
                ->setWind($this->assembleWind($data['wind']))
                ->setClouds($this->assembleClouds($data['clouds']))
                ->setSys($this->assembleSys($data['sys']))
        ;
    }

    private function assembleCoord($data): Point
    {
        return
            (new Point())
                ->setLat($data['lat'])
                ->setLon($data['lon'])
        ;
    }

    private function assembleWeather($data): array
    {
        $result = [];

        foreach ($data as $datum) {
            $result[] =
                (new Weather())
                    ->setId($datum['id'])
                    ->setMain($datum['main'])
                    ->setDescription($datum['description'])
                    ->setIcon($datum['icon']);
        }

        return $result;
    }

    private function assembleMain($data): Main
    {
        return
            (new Main())
                ->setTemp($data['temp'])
                ->setHumidity($data['humidity'])
                ->setPressure($data['pressure'])
                ->setTempMax($data['temp_max'])
                ->setTempMin($data['temp_min'])
        ;
    }

    private function assembleWind($data): Wind
    {
        return
            (new Wind())
                ->setSpeed($data['speed'])
                ->setDeg($data['deg'])
        ;
    }

    private function assembleClouds($data): Clouds
    {
        return
            (new Clouds())
                ->setAll($data['all'])
        ;
    }

    private function assembleSys($data): Sys
    {
        return
            (new Sys())
                ->setId($data['id'])
                ->setType($data['type'])
                ->setCountry($data['country'])
                ->setSunrise($data['sunrise'])
                ->setSunset($data['sunset'])
        ;
    }
}
