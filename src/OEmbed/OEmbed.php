<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Config\ConfigLoader;
use RicardoFiorani\OEmbed\Exception\AbstractOEmbedException;
use RicardoFiorani\OEmbed\Http\HttpAdapter;
use RicardoFiorani\OEmbed\Provider\Factory\ProviderFactory;
use RicardoFiorani\OEmbed\Result\Factory\ResultFactory;
use RicardoFiorani\OEmbed\Result\ResultInterface;

class OEmbed
{
    private ProviderFactory $providerFactory;
    private ResultFactory $resultFactory;

    public function __construct(
        ClientInterface $client = null,
        RequestFactoryInterface $requestFactory = null,
        UriFactoryInterface $uriFactory = null,
        bool $performanceMode = true
    ) {
        $client = $client ?? Psr18ClientDiscovery::find();
        $requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $uriFactory = $uriFactory ?? Psr17FactoryDiscovery::findUrlFactory();

        $httpAdapter = new HttpAdapter($client, $requestFactory, $uriFactory);
        $configLoader = new ConfigLoader($httpAdapter, $performanceMode);

        $this->providerFactory = new ProviderFactory($configLoader);
        $this->resultFactory = new ResultFactory($httpAdapter);
    }

    /**
     * @throws AbstractOEmbedException
     */
    public function get(
        UriInterface $uri,
        int $maxWidth = null,
        int $maxHeight = null,
        array $extraParameters = []
    ): ResultInterface {
        $parameters = $this->mergeParameters($maxWidth, $maxHeight, $extraParameters);
        $provider = $this->providerFactory->findFromUri($uri);

        return $this->resultFactory->build($provider, $uri, $parameters);
    }

    private function mergeParameters(int $maxWidth = null, int $maxHeight = null, array $parameters = []): array
    {
        if (null !== $maxWidth) {
            $parameters['maxwidth'] = $maxWidth;
        }

        if (null !== $maxHeight) {
            $parameters['maxheight'] = $maxHeight;
        }

        return $parameters;
    }
}
