<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed;

use Psr\Http\Message\UriInterface;
use RicardoFiorani\OEmbed\Exception\AbstractOEmbedException;
use RicardoFiorani\OEmbed\Provider\Factory\ProviderFactory;
use RicardoFiorani\OEmbed\Result\Factory\ResultFactory;
use RicardoFiorani\OEmbed\Result\ResultInterface;

class Service
{
    private ProviderFactory $providerFactory;
    private ResultFactory $resultFactory;

    public function __construct()
    {
        $this->providerFactory = new ProviderFactory();
        $this->resultFactory = new ResultFactory();
    }


    /**
     * @throws AbstractOEmbedException
     */
    public function build(UriInterface $uri): ResultInterface
    {
        $provider = $this->providerFactory->findFromUri($uri);

        return $this->resultFactory->build($provider, $uri);
    }
}
