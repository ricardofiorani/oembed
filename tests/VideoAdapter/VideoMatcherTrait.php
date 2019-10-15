<?php declare(strict_types=1);

namespace RicardoFioraniTests\VideoAdapter;

use RicardoFiorani\VideoAdapter\VideoAdapterInterface;
use RicardoFiorani\Exception\ServiceNotAvailableException;
use RicardoFiorani\VideoAdapter\Builder\VideoAdapterBuilder;

trait VideoMatcherTrait
{
    /**
     * @throws ServiceNotAvailableException
     */
    public function parse(string $url): VideoAdapterInterface
    {
        $videoParser = new VideoAdapterBuilder();

        return $videoParser->buildFromURL($url);
    }
}
