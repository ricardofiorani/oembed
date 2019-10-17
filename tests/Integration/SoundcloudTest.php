<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class SoundcloudTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult('https://soundcloud.com/pizzamagica/yoshis-island-super-mario-world-2-flower-garden-8-bits');

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
        TestCase::assertEquals(
            'Yoshi’s Island: Super Mario World 2 : Flower Garden (8 Bits) by 🍕 M A G I C A',
            $result->getTitle()
        );
    }
}
