<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\PhotoResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class DeviantArtTest extends TestCase
{
    use IntegrationTestTrait;

    public function testContent(): void
    {
        $result = $this->getOEmbedResult('https://www.deviantart.com/axsens/art/Mistress-Of-Evil-Maleficent--816992589');

        /** @var PhotoResult $result */
        TestCase::assertEquals(PhotoResult::TYPE, $result->getType());
        TestCase::assertEquals(600, $result->getWidth());
        TestCase::assertEquals(850, $result->getHeight());
    }
}
