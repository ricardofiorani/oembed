<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class ObservableTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Seems their oembed implementation is broken");
        $result = $this->getOEmbedResult('https://observablehq.com/@ahhhhhhhhhhhhhh/plot-u-s-map');

        TestCase::assertNotEmpty($result->getType());
    }
}
