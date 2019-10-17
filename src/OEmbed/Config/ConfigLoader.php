<?php declare(strict_types=1);


namespace RicardoFiorani\OEmbed\Config;

use RicardoFiorani\OEmbed\Exception\AbstractOEmbedException;
use RicardoFiorani\OEmbed\Http\HttpAdapter;

class ConfigLoader
{
    private HttpAdapter $httpAdapter;
    private bool $performanceMode;

    private const OEMBED_PROVIDER_LIST_ENDPOINT = 'https://oembed.com/providers.json';
    private const OEMBED_PROVIDER_LIST_METHOD = 'GET';

    public function __construct(HttpAdapter $httpAdapter, bool $performanceMode)
    {
        $this->httpAdapter = $httpAdapter;
        $this->performanceMode = $performanceMode;
    }

    /**
     * @throws AbstractOEmbedException
     */
    public function load(): array
    {
        if ($this->performanceMode) {
            return $this->loadFromFile();
        }

        return $this->httpAdapter->getJsonResponseAsArray(
            self::OEMBED_PROVIDER_LIST_METHOD,
            self::OEMBED_PROVIDER_LIST_ENDPOINT
        );
    }

    private function loadFromFile()
    {
        return json_decode(DefaultConfig::DEFAULT_CONFIG, true);
    }
}
