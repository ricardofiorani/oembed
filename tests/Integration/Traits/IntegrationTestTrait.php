<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration\Traits;

use GuzzleHttp\Psr7\Uri;
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

        $this->service = new OEmbed();

        return $this->getOEmbedResult($uri);
    }
}
