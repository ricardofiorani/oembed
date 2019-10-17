<?php declare(strict_types=1);

namespace RicardoFioraniTests\Integration;

use PHPUnit\Framework\TestCase;
use RicardoFiorani\OEmbed\Result\RichResult;
use RicardoFioraniTests\Integration\Traits\IntegrationTestTrait;

class RedditTest extends TestCase
{
    use IntegrationTestTrait;

    public function testProvider(): void
    {
        $result = $this->getOEmbedResult(
            'https://www.reddit.com/r/AskReddit/comments/bofawp/whats_the_most_hated_comment_on_reddit/enfj06t/'
        );

        TestCase::assertEquals(RichResult::TYPE, $result->getType());
    }
}
