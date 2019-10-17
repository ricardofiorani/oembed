<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Factory;

use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Config\ConfigLoader;
use RicardoFiorani\OEmbed\Exception\VideoServiceNotFoundException;
use RicardoFiorani\OEmbed\Provider\Endpoint\Adapter\SlashEndingEndpoint;
use RicardoFiorani\OEmbed\Provider\Endpoint\Adapter\SlashlessEndingEndpoint;
use RicardoFiorani\OEmbed\Provider\Endpoint\EndpointInterface;
use RicardoFiorani\OEmbed\Provider\Endpoint\GenericEndpoint;
use RicardoFiorani\OEmbed\Provider\Provider;
use RicardoFiorani\OEmbed\Provider\ProviderInterface;

class ProviderFactory
{
    private array $config = [];
    private ConfigLoader $configLoader;

    public function __construct(ConfigLoader $configLoader)
    {
        $this->configLoader = $configLoader;
    }

    /**
     * @throws VideoServiceNotFoundException
     */
    public function findFromUri(UriInterface $uri): ProviderInterface
    {
        $providerConfig = $this->findProviderConfig($uri);

        return $this->buildFromArray($providerConfig);
    }

    /**
     * @throws VideoServiceNotFoundException
     */
    private function findProviderConfig(UriInterface $uri): array
    {
        foreach ($this->getConfig() as $serviceConfig) {
            foreach ((array)$serviceConfig['endpoints'] as $endpoint) {
                foreach ((array)$endpoint['schemes'] as $scheme) {
                    $pattern = $this->escapePattern($scheme);

                    if (1 === preg_match($pattern, (string)$uri)) {
                        $serviceConfig['endpoint_used'] = $endpoint;

                        return $serviceConfig;
                    }
                }
            }
        }

        throw new VideoServiceNotFoundException(
            "The URL {$uri} is not compatible with any oEmbed provider."
        );
    }

    private function escapePattern(string $scheme): string
    {
        $pattern = str_replace(
            ['/', '*', 'http'],
            ['\/', '.*', ''],
            $scheme
        );

        return "/{$pattern}/";
    }

    private function buildFromArray(array $providerConfig): ProviderInterface
    {
        return new Provider(
            $providerConfig['provider_name'],
            $providerConfig['provider_url'],
            $this->getEndpoint($providerConfig)
        );
    }

    private function getConfig(): array
    {
        if (false === empty($this->config)) {
            return $this->config;
        }

        return $this->config = $this->configLoader->load();
    }

    /**
     * TODO FIND OUT WHY REDIRECTS ARE NOT FOLLOWED
     */
    private function getEndpoint($providerConfig): EndpointInterface
    {
        switch (true) {
            case in_array(
                $providerConfig['provider_name'],
                SlashEndingEndpoint::PROVIDER_COMPATIBILITY_LIST,
                false
            ):
                return new SlashEndingEndpoint(
                    $providerConfig['endpoint_used']['schemes'],
                    $providerConfig['endpoint_used']['url'],
                    (bool)$providerConfig['endpoint_used']['discovery']
                );
            case in_array(
                $providerConfig['provider_name'],
                SlashlessEndingEndpoint::PROVIDER_COMPATIBILITY_LIST,
                false
            ):
                return new SlashlessEndingEndpoint(
                    $providerConfig['endpoint_used']['schemes'],
                    $providerConfig['endpoint_used']['url'],
                    (bool)$providerConfig['endpoint_used']['discovery']
                );
            default:
                return new GenericEndpoint(
                    $providerConfig['endpoint_used']['schemes'],
                    $providerConfig['endpoint_used']['url'],
                    (bool)$providerConfig['endpoint_used']['discovery']
                );
        }
    }
}
