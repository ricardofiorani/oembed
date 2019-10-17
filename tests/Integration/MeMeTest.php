<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MeMeTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult('https://me.me/i/everyones-out-partying-and-im-like-38-funny-quotes-laughing-3316c52b22f14a0c9f4e4d771ad163f5');

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }

}
