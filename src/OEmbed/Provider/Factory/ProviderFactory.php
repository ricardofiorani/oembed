<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Factory;

use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Exception\VideoServiceNotFoundException;
use RicardoFiorani\OEmbed\Provider\Endpoint\Endpoint;
use RicardoFiorani\OEmbed\Provider\Provider;
use RicardoFiorani\OEmbed\Provider\ProviderInterface;

class ProviderFactory
{
    private array $config;

    public function __construct()
    {
        /*
         * @TODO move this to a proper PSR way
         */
        $this->config = json_decode(file_get_contents('https://oembed.com/providers.json'), true);
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
        foreach ($this->config as $serviceConfig) {
            foreach ((array)$serviceConfig['endpoints'] as $endpoint) {
                foreach ((array)$endpoint['schemes'] as $scheme) {
                    $pattern = $this->escapePattern($scheme);

                    if (1 === preg_match($pattern, (string)$uri)) {
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
            ['/', '*'],
            ['\/', '.*'],
            $scheme
        );

        return "/{$pattern}/";
    }

    private function buildFromArray(array $providerConfig): ProviderInterface
    {
        return new Provider(
            $providerConfig['provider_name'],
            $providerConfig['provider_url'],
            //Today we use the first item in the endpoints instead of checking the list for the sake of YAGNI
            new Endpoint(
                reset($providerConfig['endpoints'])['schemes'],
                reset($providerConfig['endpoints'])['url'],
                reset($providerConfig['endpoints'])['discovery']
            )
        );
    }
}
