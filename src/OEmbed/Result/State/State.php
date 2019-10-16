<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result\State;

use RicardoFiorani\OEmbed\Exception\InvalidMetadataKeyException;

class State
{
    private string $type;
    private string $version;
    private ?string $title;
    private ?string $authorName;
    private ?string $authorUrl;
    private ?string $providerName;
    private ?string $providerUrl;
    private ?string $cacheAge;
    private ?string $thumbnailUrl;
    private ?int $thumbnailWidth;
    private ?int $thumbnailHeight;
    private array $extraMetadata;

    public function __construct(
        string $type,
        string $version,
        string $title = null,
        string $authorName = null,
        string $authorUrl = null,
        string $providerName = null,
        string $providerUrl = null,
        string $cacheAge = null,
        string $thumbnailUrl = null,
        int $thumbnailWidth = null,
        int $thumbnailHeight = null,
        array $extraMetadata = []
    ) {
        $this->type = $type;
        $this->version = $version;
        $this->title = $title;
        $this->authorName = $authorName;
        $this->authorUrl = $authorUrl;
        $this->providerName = $providerName;
        $this->providerUrl = $providerUrl;
        $this->cacheAge = $cacheAge;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->thumbnailWidth = $thumbnailWidth;
        $this->thumbnailHeight = $thumbnailHeight;
        $this->extraMetadata = $extraMetadata;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function getAuthorUrl(): ?string
    {
        return $this->authorUrl;
    }

    public function getProviderName(): ?string
    {
        return $this->providerName;
    }

    public function getProviderUrl(): ?string
    {
        return $this->providerUrl;
    }

    public function getCacheAge(): ?string
    {
        return $this->cacheAge;
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnailWidth;
    }

    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnailHeight;
    }

    /**
     * @throws InvalidMetadataKeyException
     */
    public function getMetadata(string $key): string
    {
        if (false === $this->hasMetadata($key)) {
            throw new InvalidMetadataKeyException(
                "{$key} is not a valid key in this response"
            );
        }
    }

    public function hasMetadata(string $key): bool
    {
        return isset($this->extraMetadata[$key]);
    }
}
