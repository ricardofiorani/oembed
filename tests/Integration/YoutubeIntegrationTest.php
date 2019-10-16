<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\VideoResult;
use RicardoFiorani\OEmbed\Service;

class YoutubeIntegrationTest extends TestCase
{
    public function testYoutube(): void
    {
        $service = new Service();
        $result = $service->build(new Uri('https://www.youtube.com/watch?v=WMBNHy1C4eY'));

        TestCase::assertInstanceOf(VideoResult::class, $result);
        TestCase::assertEquals('YouTube', $result->getProviderName());
    }
}
