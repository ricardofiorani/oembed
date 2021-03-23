<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Provider\Endpoint\Adapter;

use RicardoFiorani\OEmbed\Provider\Endpoint\GenericEndpoint;

class RequiresFacebookTokenEndpoint extends GenericEndpoint
{
    public const PROVIDER_COMPATIBILITY_LIST = [
        'Instagram',
        'Facebook'
    ];

    public function __construct(array $schemes, string $url, bool $isDiscovery = false)
    {
        parent::__construct($schemes, $url, $isDiscovery);
    }
}