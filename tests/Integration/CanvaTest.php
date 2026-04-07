<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class CanvaTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://www.canva.com/design/DACyyfaeSYo/view');

        TestCase::assertNotEmpty($result->getType());
    }
}
