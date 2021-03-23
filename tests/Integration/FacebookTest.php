<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class FacebookTest extends TestCase
{
    use IntegrationTestTrait;

    public function testVideo(): void
    {
        $accessToken = getenv('FB_TOKEN');
        $result = $this->getOEmbedResult('https://www.facebook.com/zuck/videos/10112048862145471', $accessToken);

        self::assertEquals('video', $result->getType());
    }

    public function testPost(): void
    {
        $accessToken = getenv('FB_TOKEN');
        $result = $this->getOEmbedResult('https://www.facebook.com/zuck/posts/10112074198730751', $accessToken);

        self::assertEquals('rich', $result->getType());
    }
}
