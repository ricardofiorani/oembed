<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class FacebookTest extends TestCase
{
    use IntegrationTestTrait;

    public function testVideo(): void
    {
        $this->markTestSkipped("Facebook doesn't knows that the O in Oembed stands for OPEN");
        $accessToken = getenv('FB_TOKEN');
        $result = $this->getOEmbedResult('https://www.facebook.com/zuck/videos/10112048862145471', $accessToken);

        TestCase::assertEquals('video', $result->getType());
    }

    public function testPost(): void
    {
        $this->markTestSkipped("Facebook doesn't that the O in Oembed stands for OPEN");

        $accessToken = getenv('FB_TOKEN');
        $result = $this->getOEmbedResult('https://www.facebook.com/zuck/posts/10112074198730751', $accessToken);

        TestCase::assertEquals('rich', $result->getType());
    }
}
