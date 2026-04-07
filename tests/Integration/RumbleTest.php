<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class RumbleTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Waiting for https://github.com/iamcal/oembed/pull/867 to be merged");
        $result = $this->getOEmbedResult('https://rumble.com/api/Media/oembed.json?url=https%3A%2F%2Frumble.com%2Fv30jzs-dog-dont-know-where-to-hide-her-bone.html');

        TestCase::assertNotEmpty($result->getType());
    }
}
