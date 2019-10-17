<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Result\State\State;

class RichResult extends AbstractResult
{
    public const TYPE = 'rich';
    private string $html;
    private ?int $width;
    private ?int $height;

    /**
     * Even though the OEmbed format specifies for type "Rich" the width and height are REQUIRED,
     * Facebook doesn't comply so we null it in here :shrug:
     */
    public function __construct(State $state, string $html, int $width = null, int $height = null)
    {
        $this->setState($state);
        $this->html = $html;
        $this->width = $width;
        $this->height = $height;
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function getHtml(): string
    {
        return $this->html;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function __toString(): string
    {
        return $this->getHtml();
    }
}
