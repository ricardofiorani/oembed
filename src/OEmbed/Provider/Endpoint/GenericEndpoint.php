<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint;

class GenericEndpoint implements EndpointInterface
{
    private const DEFAULT_FORMAT = 'json';
    private array $schemes;
    private string $url;
    private bool $discovery;

    public function __construct(array $schemes, string $url, bool $discovery = false)
    {
        $this->schemes = $schemes;
        $this->url = $this->makeUrl($url);
        $this->discovery = $discovery;
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
        return $this->discovery;
    }

    private function makeUrl(string $url): string
    {
        return str_replace('{format}', self::DEFAULT_FORMAT, $url);
    }
}
