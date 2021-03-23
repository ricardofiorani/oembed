<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint;

class GenericEndpoint implements EndpointInterface
{
    private const DEFAULT_FORMAT = 'json';
    private array $schemes;
    private string $url;
    private bool $isDiscovery;

    public function __construct(array $schemes, string $url, bool $isDiscovery = false)
    {
        $this->schemes = $schemes;
        $this->url = $this->makeUrl($url);
        $this->isDiscovery = $isDiscovery;
    }

    public function getSchemes(): array
    {
        return $this->schemes;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function isDiscovery(): bool
    {
        return $this->isDiscovery;
    }

    private function makeUrl(string $url): string
    {
        return str_replace('{format}', self::DEFAULT_FORMAT, $url);
    }
}
