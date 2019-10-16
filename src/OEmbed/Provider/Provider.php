<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider;

use RicardoFiorani\OEmbed\Provider\Endpoint\EndpointInterface;

class Provider implements ProviderInterface
{
    private string $name;
    private string $url;
    private EndpointInterface $endpoint;

    public function __construct(string $name, string $url, EndpointInterface $endpoint)
    {
        $this->name = $name;
        $this->url = $url;
        $this->endpoint = $endpoint;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getEndpoint(): EndpointInterface
    {
        return $this->endpoint;
    }
}
