<?php

namespace App\Lib\OpenWeatherMap;

use App\Lib\OpenWeatherMap\Assembler\ResponseAssemblerInterface;
use App\Lib\OpenWeatherMap\DTO\Request\RequestByCoords;
use App\Lib\OpenWeatherMap\DTO\Request\RequestById;
use App\Lib\OpenWeatherMap\DTO\Response\Response;
use App\Lib\HttpInteraction\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class Interaction implements InteractionInterface
{
    private ClientInterface $client;
    private ResponseAssemblerInterface $responseAssembler;

    /**
     * @param ClientInterface $client
     * @param ResponseAssemblerInterface $responseAssembler
     */
    public function __construct(ClientInterface $client, ResponseAssemblerInterface $responseAssembler)
    {
        $this->client = $client;
        $this->responseAssembler = $responseAssembler;
    }

    /**
     * @param RequestById $request
     * @return Response
     * @throws GuzzleException
     */
    public function getCurrentWeatherById(RequestById $request): Response
    {
        $response = $this->client->request('GET', '/data/2.5/weather', [
            'query' => [
                'id' => $request->getId(),
                'appid' => $request->getAppid(),
                'units' => $request->getUnits(),
                'lang' => $request->getLanguage(),
            ],
        ]);

        return $this->responseAssembler->assemble($response);
    }

    /**
     * @param RequestByCoords $request
     * @return Response
     * @throws GuzzleException
     */
    public function getCurrentWeatherByCoords(RequestByCoords $request)
    {
        $response = $this->client->request('GET', '/data/2.5/weather', [
            'query' => [
                'lat' => $request->getPoint()->getLat(),
                'lon' => $request->getPoint()->getLon(),
                'appid' => $request->getAppid(),
                'units' => $request->getUnits(),
                'lang' => $request->getLanguage(),
            ],
        ]);

        return $this->responseAssembler->assemble($response);
    }
}
