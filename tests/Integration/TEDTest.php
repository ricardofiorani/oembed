<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class TEDTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://www.ted.com/talks/tony_testa_a_spine_tingling_dance_of_light_and_shadow');

        TestCase::assertNotEmpty($result->getType());
    }
}
