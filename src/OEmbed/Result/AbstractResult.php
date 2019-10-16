<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Result\State\State;

abstract class AbstractResult implements ResultInterface
{
    private State $state;

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function getMetaData(string $key): string
    {
        return $this->state->getMetadata($key);
    }

    public function hasMetadata(string $key): bool
    {
        return $this->state->hasMetadata($key);
    }

    public function getTitle(): ?string
    {
        return $this->state->getTitle();
    }

    public function getAuthorName(): ?string
    {
        return $this->state->getAuthorName();
    }

    public function getAuthorUrl(): ?string
    {
        return $this->state->getAuthorUrl();
    }

    public function getProviderName(): ?string
    {
        return $this->state->getProviderName();
    }

    public function getProviderUrl(): ?string
    {
        return $this->state->getProviderUrl();
    }

    public function getCacheAge(): ?string
    {
        return $this->state->getCacheAge();
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->state->getThumbnailUrl();
    }

    public function getThumbnailWidth(): ?int
    {
        return $this->state->getThumbnailWidth();
    }

    public function getThumbnailHeight(): ?int
    {
        return $this->state->getThumbnailHeight();
    }
}
