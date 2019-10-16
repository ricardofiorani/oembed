<?php declare(strict_types=1);

namespace RicardoFiorani\OEmbed\Result;

use RicardoFiorani\OEmbed\Exception\InvalidMetadataKeyException;

interface ResultInterface
{
    /**
     * @throws \RicardoFiorani\OEmbed\Exception\InvalidMetadataKeyException
     */
    public function getMetaData(string $key): string;

    public function hasMetadata(string $key): bool;

    public function getType(): string;

    public function getTitle(): ?string;

    public function getAuthorName(): ?string;

    public function getAuthorUrl(): ?string;

    public function getProviderName(): ?string;

    public function getProviderUrl(): ?string;

    public function getCacheAge(): ?string;

    public function getThumbnailUrl(): ?string;

    public function getThumbnailWidth(): ?int;

    public function getThumbnailHeight(): ?int;

    public function __toString(): string;
}
