<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class InstagramTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $accessToken = getenv('FB_TOKEN');
        $result = $this->getOEmbedResult('https://www.instagram.com/p/B2anRWMlz57/', $accessToken);

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
