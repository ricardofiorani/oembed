<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MiroTest extends TestCase
{
    use IntegrationTestTrait;

    public function testOEmbed(): void
    {
        $result = $this->getOEmbedResult('https://www.figma.com/board/C7BeKOviEtZOnBWn2R1wqj/https---miro.com-app-board-uXjVGOdtAcE---share_link_id-171435881108?node-id=0-1&t=hBSuQ5JWoQuVOcSh-1');

        TestCase::assertNotEmpty($result->getType());
    }
}
