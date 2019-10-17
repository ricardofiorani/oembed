<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\VideoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class GfycatTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult('https://gfycat.com/alertadolescentafricancivet');

        TestCase::assertEquals(VideoResult::TYPE, $result->getType());
    }
}
