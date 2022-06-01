<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint\Adapter;

use RicardoFiorani\OEmbed\Provider\Endpoint\GenericEndpoint;

class SlashlessEndingEndpoint extends GenericEndpoint
{
    public const PROVIDER_COMPATIBILITY_LIST = [
    ];

    public function __construct(array $schemes, string $url, bool $isDiscovery = false)
    {
        $url = $this->makeUrl($url);
        parent::__construct($schemes, $url, $isDiscovery);
    }

    private function makeUrl(string $url): string
    {
        return substr($url, 0, -1);
    }
}
