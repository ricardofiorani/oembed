<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\OEmbed;
use RicardoFiorani\OEmbed\Result\VideoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class VimeoTest extends TestCase
{
    use IntegrationTestTrait;

    public function testContent(): void
    {
        $result = $this->getOEmbedResult('https://vimeo.com/76979871');

        /** @var VideoResult $result */
        TestCase::assertEquals(VideoResult::TYPE, $result->getType());
        TestCase::assertEquals(480, $result->getWidth());
        TestCase::assertEquals(270, $result->getHeight());
        TestCase::assertEquals(62, $result->getMetaData('duration'));
    }
}
