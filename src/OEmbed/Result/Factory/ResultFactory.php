<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result\Factory;

use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Exception\HttpAdapterException;
use RicardoFiorani\OEmbed\Exception\InvalidResultTypeException;
use RicardoFiorani\OEmbed\Http\HttpAdapter;
use RicardoFiorani\OEmbed\Provider\ProviderInterface;
use RicardoFiorani\OEmbed\Result\LinkResult;
use RicardoFiorani\OEmbed\Result\PhotoResult;
use RicardoFiorani\OEmbed\Result\ResultInterface;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFiorani\OEmbed\Result\State\State;
use RicardoFiorani\OEmbed\Result\VideoResult;

class ResultFactory
{
    private const DEFAULT_HTTP_METHOD = 'GET';
    private HttpAdapter $httpAdapter;

    public function __construct(HttpAdapter $httpAdapter)
    {
        $this->httpAdapter = $httpAdapter;
    }

    /**
     * @throws InvalidResultTypeException
     * @throws HttpAdapterException
     */
    public function build(ProviderInterface $service, UriInterface $uri, array $extraParameters = []): ResultInterface
    {
        $data = $this->fetchData($service, $uri, $extraParameters);

        return $this->buildResultFromData($data);
    }

    /**
     * TODO FIND OUT WHY REDIRECTS ARE NOT FOLLOWED
     *gi
     * @throws HttpAdapterException
     */
    private function fetchData(ProviderInterface $service, UriInterface $uri, array $extraParameters = []): array
    {
        $query = [
            'url' => (string)$uri,
            'format' => 'json',
        ];

        $endpointCall = $this
            ->httpAdapter
            ->getUriFactory()
            ->createUri($service->getEndpoint()->getUrl())
            ->withQuery(http_build_query($query + $extraParameters));

        return $this->httpAdapter->getJsonResponseAsArray(
            self::DEFAULT_HTTP_METHOD,
            (string)$endpointCall
        );
    }

    /**
     * @throws InvalidResultTypeException
     */
    private function buildResultFromData(array $data): ResultInterface
    {
        $state = new State(
            (string)($data['type'] ?? null),
            (string)($data['version'] ?? null), //Apparently each provider decides between string and float...
            $data['title'] ?? null,
            $data['author_name'] ?? null,
            $data['author_url'] ?? null,
            $data['provider_name'] ?? null,
            $data['provider_url'] ?? null,
            $data['cache_age'] ?? null,
            $data['thumbnail_url'] ?? null,
            isset($data['thumbnail_width']) ? (int)$data['thumbnail_width'] : null,
            isset($data['thumbnail_height']) ? (int)$data['thumbnail_height'] : null,
            $data,
        );

        $width = (int)($data['width'] ?? null);
        $height = (int)($data['height'] ?? null);

        switch ($state->getType()) {
            case PhotoResult::TYPE:
                return new PhotoResult(
                    (string)$data['url'],
                    $width,
                    $height,
                    $state,
                );
            case VideoResult::TYPE:
                return new VideoResult(
                    (string)$data['html'],
                    $width,
                    $height,
                    $state,
                );
            case LinkResult::TYPE:
                return new LinkResult($state);
            case RichResult::TYPE:
                return new RichResult(
                    $state,
                    (string)$data['html'],
                    $width,
                    $height,
                );
            default:
                throw new InvalidResultTypeException(
                    "The type {$state->getType()} is not a valid type."
                );
        }
    }
}
