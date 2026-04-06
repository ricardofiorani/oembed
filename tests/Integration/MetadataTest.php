<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MetadataTest extends TestCase
{
    use IntegrationTestTrait;

    public function testHasMetadataReturnsFalseForNonExistentKey(): void
    {
        $result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');

        TestCase::assertFalse($result->hasMetadata('nonexistent_key'));
    }

    public function testGetMetadataThrowsExceptionForNonExistentKey(): void
    {
        $result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');

        $this->expectException(\RicardoFiorani\OEmbed\Exception\InvalidMetadataKeyException::class);
        $result->getMetadata('nonexistent_key');
    }

    public function testCanAccessExtraMetadataWhenPresent(): void
    {
        $result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');

        TestCase::assertTrue($result->hasMetadata('type'));
        TestCase::assertEquals('video', $result->getMetadata('type'));
    }

    public function testCanAccessProviderResponseData(): void
    {
        $result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');

        TestCase::assertTrue($result->hasMetadata('provider_name'));
        TestCase::assertEquals('YouTube', $result->getMetadata('provider_name'));
    }
}