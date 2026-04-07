<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class ApplePodcastsTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://podcasts.apple.com/us/podcast/apple-event-september-9/id1473854035?i=1000725760734');

        TestCase::assertNotEmpty($result->getType());
    }
}
