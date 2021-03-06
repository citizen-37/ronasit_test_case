<?php

namespace App\Http\Controllers;

use App\Http\Resources\Weather\ResponseResource;
use App\Lib\OpenWeatherMap\Enums\MeasureUnits;
use App\Lib\OpenWeatherMap\Factory\RequestFactoryInterface;
use App\Lib\OpenWeatherMap\InteractionInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    /**
     * @param $id
     * @param Request $request
     * @param InteractionInterface $interaction
     * @param RequestFactoryInterface $requestFactory
     * @return ResponseResource|Response
     */
    public function currentByCityId($id, Request $request, InteractionInterface $interaction, RequestFactoryInterface $requestFactory): Response|ResponseResource
    {
        $validator = $this->getValidationFactory()->make($request->all(), $this->rulesByCityId($request));

        if ($validator->fails()) {
            return $this->validationErrorsResponse($validator);
        }

        $interactionRequest = $requestFactory->createWithId(
            $id,
            $request->get('units'),
            'ru'
        );

        $key = sprintf("%s_%s",
            $interactionRequest->getId(),
            $interactionRequest->getUnits()
        );

        return Cache::remember($key, 60 * 60, function () use ($interactionRequest, $interaction) {
            return new ResponseResource($interaction->getCurrentWeatherById($interactionRequest));
        });
    }

    /**
     * @param Request $request
     * @param InteractionInterface $interaction
     * @param RequestFactoryInterface $requestFactory
     * @return Response|ResponseResource
     */
    public function currentByCoords(Request $request, InteractionInterface $interaction, RequestFactoryInterface $requestFactory): Response|ResponseResource
    {
        $validator = $this->getValidationFactory()->make($request->all(), $this->rulesByCoords($request));

        if ($validator->fails()) {
            return $this->validationErrorsResponse($validator);
        }

        $interactionRequest = $requestFactory->createWithCoords(
            $request->get('lat'),
            $request->get('lon'),
            $request->get('units'),
            'ru'
        );

        $key = sprintf("%s_%s_%s",
            $interactionRequest->getPoint()->getLon(),
            $interactionRequest->getPoint()->getLat(),
            $interactionRequest->getUnits()
        );

        return Cache::remember($key, 60 * 60, function () use ($interactionRequest, $interaction) {
            return new ResponseResource($interaction->getCurrentWeatherByCoords($interactionRequest));
        });
    }

    /**
     * @param Request $request
     * @return \string[][]
     */
    private function rulesByCityId(Request $request)
    {
        return [
            'units' => ['required', 'in:' . implode(',', [MeasureUnits::IMPERIAL, MeasureUnits::METRIC])],
        ];
    }

    /**
     * @param Request $request
     * @return \string[][]
     */
    private function rulesByCoords(Request $request)
    {
        return [
            'units' => ['required', 'in:' . implode(',', [MeasureUnits::IMPERIAL, MeasureUnits::METRIC])],
            'lat' => ['required', 'numeric'],
            'lon' => ['required', 'numeric'],
        ];
    }
}
