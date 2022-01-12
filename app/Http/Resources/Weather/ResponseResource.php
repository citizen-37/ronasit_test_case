<?php

namespace App\Http\Resources\Weather;

use App\Lib\OpenWeatherMap\DTO\Response\Response;
use App\Lib\Utils\CompassTrait;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Response $resource
 */
class ResponseResource extends JsonResource
{
    use CompassTrait;

    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'description' => $this->getDescription(),
            'icon' => $this->getIcon(),
            'temp' => $this->resource->getMain()->getTemp(),
            'cityName' => $this->resource->getName(),
            'pressure' => $this->resource->getMain()->getPressure(),
            'humidity' => $this->resource->getMain()->getHumidity(),
            'windSpeed' => $this->resource->getWind()->getSpeed(),
            'windDirection' => $this->getWindDirection(),
        ];
    }

    private function getId(): int
    {
        return $this->resource->getWeather()[0]->getId();
    }

    private function getDescription(): string
    {
        return $this->resource->getWeather()[0]->getDescription();
    }

    private function getIcon(): string
    {
        return $this->resource->getWeather()[0]->getId();
    }

    private function getWindDirection(): string
    {
        return $this->degreesToDirection(
            $this->resource->getWind()->getDeg()
        );
    }
}
