<?php

namespace App\Lib\OpenWeatherMap;

use App\Lib\OpenWeatherMap\DTO\Request\RequestByCoords;
use App\Lib\OpenWeatherMap\DTO\Request\RequestById;
use App\Lib\OpenWeatherMap\DTO\Response\Response;
use GuzzleHttp\Exception\GuzzleException;

interface InteractionInterface
{
    /**
     * @param RequestById $request
     * @return Response
     * @throws GuzzleException
     */
    public function getCurrentWeatherById(RequestById $request): Response;

    /**
     * @param RequestByCoords $request
     * @return Response
     * @throws GuzzleException
     */
    public function getCurrentWeatherByCoords(RequestByCoords $request);
}
