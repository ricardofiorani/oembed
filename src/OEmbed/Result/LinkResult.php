<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Result\State\State;

class LinkResult extends AbstractResult
{
    public const TYPE = 'link';

    public function __construct(State $state)
    {
        $this->setState($state);
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function __toString(): string
    {
        switch(true){
            case $this->hasMetadata('link'):
                return $this->getMetaData('link');
            case $this->hasMetadata('url'):
                return $this->getMetaData('url');
            case $this->hasMetadata('html'):
                return $this->getMetaData('html');
            default:
                throw new \LogicException(
                    'There is not guessable property to be used as string.'
                );
        }
    }
}
