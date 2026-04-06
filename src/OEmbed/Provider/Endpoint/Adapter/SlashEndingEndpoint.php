<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint\Adapter;

use RicardoFiorani\OEmbed\Provider\Endpoint\GenericEndpoint;

class SlashEndingEndpoint extends GenericEndpoint
{
    public const PROVIDER_COMPATIBILITY_LIST = [
        'me.me',
    ];

    /**
     * @param array<string> $schemes
     */
    public function __construct(array $schemes, string $url, bool $isDiscovery = false)
    {
        $url = $this->makeUrl($url);
        parent::__construct($schemes, $url, $isDiscovery);
    }

    private function makeUrl(string $url): string
    {
        return $url . '/';
    }
}
