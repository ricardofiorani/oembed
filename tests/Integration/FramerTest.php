<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class FramerTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Couldn't find a single URL that works with this ****");
        $result = $this->getOEmbedResult('https://www.framer.com/gallery/akiflow');

        TestCase::assertNotEmpty($result->getType());
    }
}
