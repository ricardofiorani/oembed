<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class FacebookTest extends TestCase
{
    use IntegrationTestTrait;

    public function testVideo(): void
    {
        $result = $this->getOEmbedResult('https://www.facebook.com/FacebookDeutschland/videos/2403439749688130/');

        self::assertEquals('video', $result->getType());
    }

    public function testPost(): void
    {
        $result = $this->getOEmbedResult('https://www.facebook.com/deutschland.de/posts/10157828150787351');

        self::assertEquals('rich', $result->getType());
    }
}
