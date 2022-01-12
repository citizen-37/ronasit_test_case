<?php

namespace App\Lib\HttpInteraction;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

interface ClientInterface
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(string $method, string $uri, array $options): array;
}
