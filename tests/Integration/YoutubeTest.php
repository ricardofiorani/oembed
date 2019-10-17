<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\VideoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class YoutubeTest extends TestCase
{
    use IntegrationTestTrait;

    public function testYoutube(): void
    {
        $result = $this->getOEmbedResult('https://www.youtube.com/watch?v=WMBNHy1C4eY');

        TestCase::assertInstanceOf(VideoResult::class, $result);
        TestCase::assertEquals('YouTube', $result->getProviderName());
    }
}
