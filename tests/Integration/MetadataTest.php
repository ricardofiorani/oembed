<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\ResultInterface;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MetadataTest extends TestCase
{
    use IntegrationTestTrait;

    protected ResultInterface $result;

    protected function setUp(): void
    {
        $this->result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');
    }

    public function testHasMetadataReturnsFalseForNonExistentKey(): void
    {
        TestCase::assertFalse($this->result->hasMetadata('nonexistent_key'));
    }

    public function testGetMetadataThrowsExceptionForNonExistentKey(): void
    {
        $this->expectException(\RicardoFiorani\OEmbed\Exception\InvalidMetadataKeyException::class);
        $this->result->getMetadata('nonexistent_key');
    }

    public function testCanAccessExtraMetadataWhenPresent(): void
    {
        TestCase::assertTrue($this->result->hasMetadata('type'));
        TestCase::assertEquals('video', $this->result->getMetadata('type'));
    }

    public function testCanAccessProviderResponseData(): void
    {
        TestCase::assertTrue($this->result->hasMetadata('provider_name'));
        TestCase::assertEquals('YouTube', $this->result->getMetadata('provider_name'));
    }
}