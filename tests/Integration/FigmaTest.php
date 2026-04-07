<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class FigmaTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://www.figma.com/design/zkDKRjFbHATgclev6mx1iw/Figma-Multiplayer-Dice-Games---Community-?node-id=344-4950&t=MYrxjMBbU7746Zq6-1');

        TestCase::assertNotEmpty($result->getType());
    }
}
