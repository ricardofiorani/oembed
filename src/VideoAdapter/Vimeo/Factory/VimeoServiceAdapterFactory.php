<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter\Vimeo\Factory;

use RicardoFiorani\VideoAdapter\CallableServiceAdapterFactoryInterface;
use RicardoFiorani\VideoAdapter\VideoAdapterInterface;
use RicardoFiorani\VideoAdapter\Vimeo\VimeoServiceAdapter;
use RicardoFiorani\Renderer\EmbedRendererInterface;

class VimeoServiceAdapterFactory implements CallableServiceAdapterFactoryInterface
{
    public function __invoke(string $url, string $pattern, EmbedRendererInterface $renderer): VideoAdapterInterface
    {
        return new VimeoServiceAdapter($url, $pattern, $renderer);
    }
}
