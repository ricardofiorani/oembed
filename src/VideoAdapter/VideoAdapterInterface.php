<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter;

use RicardoFiorani\Exception\NotEmbeddableException;

interface VideoAdapterInterface
{
    public function getServiceName(): string;

    public function getRawUrl(): string;

    public function hasThumbnail(): bool;

    public function getThumbnailBuilder(): VideoThumbnailBuilderInterface;

    public function getEmbedUrl(bool $forceAutoplay = false, bool $forceSecure = false): string;

    /**
     * @throws NotEmbeddableException
     */
    public function getEmbedCode(
        int $width,
        int $height,
        bool $forceAutoplay = false,
        bool $forceSecure = false
    ): string;

    public function isEmbeddable(): bool;
}
