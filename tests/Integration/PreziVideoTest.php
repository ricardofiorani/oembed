<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class PreziVideoTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://prezi.com/v/view/jmlpXDBScwoq3ulYEJtU/');

        TestCase::assertNotEmpty($result->getType());
    }
}
