<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class HuluTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("Hulu oEmbed support has largely been deprecated by the provider");
        // https://wptavern.com/wordpress-5-5-to-remove-hulu-from-list-of-supported-oembed-providers
        $result = $this->getOEmbedResult('http://www.hulu.com/watch/123456');

        TestCase::assertNotEmpty($result->getType());
    }
}
