<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\VideoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class TwitchTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult(
            'https://www.twitch.tv/gaules/clip/BoredFrigidMushroomBrainSlug'
        );

        TestCase::assertEquals(VideoResult::TYPE, $result->getType());
        $embed = <<<STRING
<iframe src="https://clips.twitch.tv/embed?clip=BoredFrigidMushroomBrainSlug&autoplay=false" width="620" height="351" frameborder="0" scrolling="no" allowfullscreen></iframe>
STRING;
        TestCase::assertEquals($embed, (string)$result);
    }
}
