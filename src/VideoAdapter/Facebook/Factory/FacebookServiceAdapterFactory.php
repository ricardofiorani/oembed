<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter\Facebook\Factory;

use RicardoFiorani\VideoAdapter\Facebook\FacebookServiceAdapter;
use RicardoFiorani\VideoAdapter\CallableServiceAdapterFactoryInterface;
use RicardoFiorani\VideoAdapter\VideoAdapterInterface;
use RicardoFiorani\Renderer\EmbedRendererInterface;

class FacebookServiceAdapterFactory implements CallableServiceAdapterFactoryInterface
{
    public function __invoke(string $url, string $pattern, EmbedRendererInterface $renderer): VideoAdapterInterface
    {
        return new FacebookServiceAdapter($url, $pattern, $renderer);
    }
}
