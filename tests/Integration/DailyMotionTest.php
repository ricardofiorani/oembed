<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class DailyMotionTest extends TestCase
{
    use IntegrationTestTrait;

    public function testVideo(): void
    {
        $result = $this->getOEmbedResult('https://www.dailymotion.com/video/x7mopzu');

        self::assertEquals('video', $result->getType());
    }
}
