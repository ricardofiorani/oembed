<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use Http\Adapter\Guzzle6\Client as HttpClient;
use RicardoFiorani\OEmbed\OEmbed;
use RicardoFiorani\OEmbed\Result\ResultInterface;

trait IntegrationTestTrait
{
    private OEmbed $service;

    public function getOEmbedResult(string $uri): ResultInterface
    {
        if (isset($this->service)) {
            return $this->service->get(new Uri($uri));
        }

        //Please note that most services require you to follow redirects
        $guzzle = new Client();
        $httpClient = new HttpClient($guzzle);

        $this->service = new OEmbed($httpClient);

        return $this->getOEmbedResult($uri);
    }
}
