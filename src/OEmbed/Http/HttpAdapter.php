<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Http;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use RicardoFiorani\OEmbed\Exception\HttpAdapterException;

class HttpAdapter
{
    private ClientInterface $client;
    private RequestFactoryInterface $requestFactory;
    private UriFactoryInterface $uriFactory;

    public function __construct(
        ClientInterface $client,
        RequestFactoryInterface $requestFactory,
        UriFactoryInterface $uriFactory
    ) {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
        $this->uriFactory = $uriFactory;
    }

    /**
     * @throws HttpAdapterException
     */
    public function sendRequest(string $method, string $uri): ResponseInterface
    {
        $request = $this->requestFactory->createRequest(
            $method,
            $this->uriFactory->createUri($uri)
        );

        try {
            return $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new HttpAdapterException(
                "There was a problem sending a {$method} request to {$uri}.",
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @throws HttpAdapterException
     */
    public function getJsonResponseAsArray(string $method, string $uri): array
    {
        $secureUri = $this->uriFactory->createUri($uri)->withScheme('https');
        $response = $this->sendRequest($method, (string)$secureUri);

        if ($response->getStatusCode() >= 400) {
            throw new HttpAdapterException(<<<STRING
The request to {$uri} returned a {$response->getStatusCode()} HTTP status code. 
Maybe the provider doesn't support OEmbed anymore ?
STRING
            );
        }

        $responseBody = (string)$response->getBody();

        if (empty($responseBody)) {
            throw new HttpAdapterException(<<<STRING
The request to {$uri} returned an empty body response and the {$response->getStatusCode()} HTTP status code. 
Maybe the provider doesn't support OEmbed anymore ?
STRING
            );
        }

//        var_dump($uri, $responseBody); die;
        try {
            return json_decode($responseBody, true, JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            throw new HttpAdapterException(<<<STRING
The request to {$uri} returned an malformed JSON together with the {$response->getStatusCode()} HTTP status code. 
Maybe the provider doesn't support OEmbed anymore ?
STRING
                , $exception->getCode(), $exception);
        }
    }

    public function getUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory;
    }
}
