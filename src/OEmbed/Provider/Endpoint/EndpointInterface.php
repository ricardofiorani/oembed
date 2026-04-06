<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint;

interface EndpointInterface
{
    /**
     * @return array<string>
     */
    public function getSchemes(): array;

    public function getUrl(): string;

    public function isDiscovery(): bool;
}
