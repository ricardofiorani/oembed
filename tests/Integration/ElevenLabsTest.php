<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class ElevenLabsTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Elevenlabs states they implements /* but no URL works...");
        $result = $this->getOEmbedResult('https://elevenlabs.io/blog/introducing-scribe-v2');

        TestCase::assertNotEmpty($result->getType());
    }
}
