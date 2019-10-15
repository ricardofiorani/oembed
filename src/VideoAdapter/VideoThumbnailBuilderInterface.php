<?php declare(strict_types=1);

namespace RicardoFiorani\VideoAdapter;

interface VideoThumbnailBuilderInterface
{
    public function getThumbNailSizes(): array;

    public function getThumbnail(string $size): string;

    public function getSmallThumbnail(): string;

    public function getMediumThumbnail(): string;

    public function getLargeThumbnail(): string;

    public function getLargestThumbnail(): string;
}
