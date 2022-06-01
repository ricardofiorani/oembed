<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class MeetupTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult('https://www.meetup.com/Berlin-PHP-Usergroup/events/283605098/');

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
