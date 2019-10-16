<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Result\State\State;

class VideoResult extends AbstractResult
{
    public const TYPE = 'video';
    private string $html;
    private int $width;
    private int $height;

    public function __construct(string $html, int $width, int $height, State $state)
    {
        $this->html = $html;
        $this->width = $width;
        $this->height = $height;
        $this->setState($state);
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function getHtml(): string
    {
        return $this->html;
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
        return $this->getHtml();
    }
}
