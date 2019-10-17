<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class SpotifyTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult(
            'https://open.spotify.com/track/0vTJP35J4M1PY9iAA8UmbV?si=GnWVOwgaQ9y4UuNHxoGc1Q'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
