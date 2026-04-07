<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class IFTTTTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Apparently doesn't work anymore...");
        $result = $this->getOEmbedResult('http://ifttt.com/recipes/AGqCvdna-get-directions-to-any-event');

        TestCase::assertNotEmpty($result->getType());
    }
}
