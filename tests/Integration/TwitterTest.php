<?php declare(strict_types=1);


namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class TwitterTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult(
            'https://twitter.com/michelecrossing/status/1184295636637749248'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
