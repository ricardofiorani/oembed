<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\PhotoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class GiphyTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult('https://giphy.com/gifs/6Q3M4BIK0lX44');

        TestCase::assertEquals(PhotoResult::TYPE, $result->getType());
    }
}
