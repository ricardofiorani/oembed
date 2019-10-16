<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Result\State\State;

class PhotoResult extends AbstractResult
{
    public const TYPE = 'photo';

    private string $url;
    private int $width;
    private int $height;

    public function __construct(string $url, int $width, int $height, State $state)
    {
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
        $this->setState($state);
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function __toString(): string
    {
        return $this->getUrl();
    }
}
