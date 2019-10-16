<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider;

use RicardoFiorani\OEmbed\Provider\Endpoint\EndpointInterface;

interface ProviderInterface
{
    public function getName(): string;

    public function getUrl(): string;

    public function getEndpoint(): EndpointInterface;
}
