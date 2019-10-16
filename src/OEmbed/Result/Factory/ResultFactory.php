<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result\Factory;

use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Exception\InvalidResultTypeException;
use RicardoFiorani\OEmbed\Provider\ProviderInterface;
use RicardoFiorani\OEmbed\Result\LinkResult;
use RicardoFiorani\OEmbed\Result\PhotoResult;
use RicardoFiorani\OEmbed\Result\ResultInterface;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFiorani\OEmbed\Result\State\State;
use RicardoFiorani\OEmbed\Result\VideoResult;

class ResultFactory
{
    /**
     * @throws InvalidResultTypeException
     */
    public function build(ProviderInterface $service, UriInterface $uri): ResultInterface
    {
        $data = $this->fetchData($service, $uri);

        return $this->buildResultFromData($data);
    }

    private function fetchData(ProviderInterface $service, UriInterface $uri): array
    {
        $endpointCall = $service->getEndpoint()->getUrl() . '?url=' . urlencode((string)$uri);

        return json_decode(file_get_contents($endpointCall), true);
    }

    /**
     * @throws InvalidResultTypeException
     */
    private function buildResultFromData(array $data): ResultInterface
    {
        $state = new State(
            $data['type'],
            $data['version'],
            $data['title'] ?? null,
            $data['author_name'] ?? null,
            $data['author_url'] ?? null,
            $data['provider_name'] ?? null,
            $data['provider_url'] ?? null,
            $data['cache_age'] ?? null,
            $data['thumbnail_url'] ?? null,
            $data['thumbnail_width'] ?? null,
            $data['thumbnail_height'] ?? null,
            $data,
        );

        switch ($state->getType()) {
            case PhotoResult::TYPE:
                return new PhotoResult(
                    $data['url'],
                    $data['width'],
                    $data['height'],
                    $state
                );
            case  VideoResult::TYPE:
                return new VideoResult(
                    $data['html'],
                    $data['width'],
                    $data['height'],
                    $state
                );
            case LinkResult::TYPE:
                return new LinkResult($state);
            case RichResult::TYPE:
                return new RichResult(
                    $data['html'],
                    $data['width'],
                    $data['height'],
                    $state
                );
            default:
                throw new InvalidResultTypeException(
                    "The type {$state->getType()} is not a valid type."
                );
        }
    }
}
