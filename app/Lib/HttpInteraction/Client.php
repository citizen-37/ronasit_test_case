<?php

namespace App\Lib\HttpInteraction;

use Exception;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Symfony\Component\HttpFoundation\Response;

class Client implements ClientInterface
{
    private GuzzleClientInterface $client;

    /**
     * @param GuzzleClientInterface $client
     */
    public function __construct(GuzzleClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(string $method, string $uri, array $options): array
    {
        $response = $this->client->request($method, $uri, $options);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new Exception(sprintf(
                "Erroneous response %s contents: %s",
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ), $response->getStatusCode());
        }

        return Utils::jsonDecode($response->getBody()->getContents(), true);
    }
}
