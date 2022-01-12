<?php

namespace App\Providers;

use App\Lib\OpenWeatherMap\Assembler\ResponseAssembler;
use App\Lib\OpenWeatherMap\Assembler\ResponseAssemblerInterface;
use App\Lib\OpenWeatherMap\Factory\RequestFactory;
use App\Lib\OpenWeatherMap\Factory\RequestFactoryInterface;
use App\Lib\OpenWeatherMap\Interaction;
use App\Lib\OpenWeatherMap\InteractionInterface;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class OpenWeatherMapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ResponseAssemblerInterface::class, ResponseAssembler::class);

        $this->app->bind(RequestFactoryInterface::class, function (Application $app) {
            return new RequestFactory(Config::get('open_weather_map.app_key'));
        });

        $this->app->bind(InteractionInterface::class, function (Application $app) {
            $guzzleClient = new Client([
                'base_uri' => Config::get('open_weather_map.base_uri')
            ]);

            $httpInteraction = new \App\Lib\HttpInteraction\Client($guzzleClient);

            return new Interaction($httpInteraction, $app->make(ResponseAssemblerInterface::class));
        });
    }
}
