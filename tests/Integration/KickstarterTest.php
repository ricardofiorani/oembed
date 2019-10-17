<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class KickstarterTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult(
            'https://www.kickstarter.com/projects/keytron/keychron-k4-96-compact-wireless-mechanical-keyboard'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
        $expectedHtml = <<<STRING
<iframe src="https://www.kickstarter.com/projects/keytron/keychron-k4-96-compact-wireless-mechanical-keyboard/widget/video.html" height="270.0" width="480" frameborder="0" scrolling="no"></iframe>
STRING;
        TestCase::assertEquals($expectedHtml, (string)$result);
    }
}
