<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class BlueskySocialTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://bsky.app/profile/adelpreore.bsky.social/post/3mitfpqc3fc2t');

        TestCase::assertNotEmpty($result->getType());
    }
}
