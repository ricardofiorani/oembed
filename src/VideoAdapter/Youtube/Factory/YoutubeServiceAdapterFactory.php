<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter\Youtube\Factory;

use RicardoFiorani\VideoAdapter\CallableServiceAdapterFactoryInterface;
use RicardoFiorani\VideoAdapter\VideoAdapterInterface;
use RicardoFiorani\VideoAdapter\Youtube\YoutubeServiceAdapter;
use RicardoFiorani\Renderer\EmbedRendererInterface;

class YoutubeServiceAdapterFactory implements CallableServiceAdapterFactoryInterface
{
    public function __invoke(string $url, string $pattern, EmbedRendererInterface $renderer): VideoAdapterInterface
    {
        return new YoutubeServiceAdapter($url, $pattern, $renderer);
    }
}
