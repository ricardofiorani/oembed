<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter\Dailymotion\Factory;

use RicardoFiorani\VideoAdapter\Dailymotion\DailymotionServiceAdapter;
use RicardoFiorani\VideoAdapter\CallableServiceAdapterFactoryInterface;
use RicardoFiorani\VideoAdapter\VideoAdapterInterface;
use RicardoFiorani\Renderer\EmbedRendererInterface;

class DailymotionServiceAdapterFactory implements CallableServiceAdapterFactoryInterface
{
    public function __invoke(string $url, string $pattern, EmbedRendererInterface $renderer): VideoAdapterInterface
    {
        return new DailymotionServiceAdapter($url, $pattern, $renderer);
    }
}
