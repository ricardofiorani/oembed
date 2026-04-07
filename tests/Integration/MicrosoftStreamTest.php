<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MicrosoftStreamTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $this->markTestSkipped("microslop streams requires authentication to use their service 🤦‍♂️");
        $result = $this->getOEmbedResult('https://web.microsoftstream.com/video/2747be78-1e73-4766-bb25-dc77cf594966?list=studio');

        TestCase::assertNotEmpty($result->getType());
    }
}
