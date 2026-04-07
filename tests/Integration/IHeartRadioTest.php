<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class IHeartRadioTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://www.iheart.com/podcast/1119-crimeless-299097289/episode/introducing-crimeless-hillbilly-heist-299097292/');

        TestCase::assertNotEmpty($result->getType());
    }
}
