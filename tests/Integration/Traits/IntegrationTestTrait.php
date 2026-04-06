<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use Http\Adapter\Guzzle7\Client as HttpClient;
use RicardoFiorani\OEmbed\OEmbed;
use RicardoFiorani\OEmbed\Result\ResultInterface;

trait IntegrationTestTrait
{
    private OEmbed $service;

    public function getOEmbedResult(string $uri, $accessToken = ''): ResultInterface
    {
        $extraParameters = [];

        if (false === empty($accessToken)) {
            $extraParameters['access_token'] = $accessToken;
        }

        if (isset($this->service)) {
            return $this->service->get(new Uri($uri), null, null, $extraParameters);
        }

        $this->buildService();

        return $this->getOEmbedResult($uri, $accessToken);
    }

    public function buildService(): void
    {
        //Please note that most services require you to follow redirects
        $guzzle = new Client();
        $httpClient = new HttpClient($guzzle);
        $this->service = new OEmbed($httpClient);
    }
}
