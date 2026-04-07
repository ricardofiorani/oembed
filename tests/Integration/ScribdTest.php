<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class ScribdTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('http://www.scribd.com/doc/702358625/48-Laws-of-Power-The-Robert-Greene-Joost-Elffers');

        TestCase::assertNotEmpty($result->getType());
    }
}
