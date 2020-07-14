<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class SpotifyTest extends TestCase
{
    use IntegrationTestTrait;

    public function testPlaylistUrl(): void
    {
        $result = $this->getOEmbedResult(
            'https://open.spotify.com/playlist/37i9dQZF1DWYtg7TV07mgz?si=OTx1DyDhSPK5q5V1CTR5NQ'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }

    public function testSingleTrackUrl(): void
    {
        $result = $this->getOEmbedResult(
            'https://open.spotify.com/track/3t9dq1I2VKPmEcatwRkJ9P?si=wiE4-lvCS3iOi7Iqjn7tRQ'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
