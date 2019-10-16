<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint;

class Endpoint implements EndpointInterface
{
    private array $schemes;
    private string $url;
    private bool $discovery;

    public function __construct(array $schemes, string $url, bool $discovery = false)
    {
        $this->schemes = $schemes;
        $this->url = $url;
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
}
