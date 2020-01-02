<?php

declare(strict_types=1);

namespace HelpScout\Api\Tests\Tags;

use HelpScout\Api\Tags\TagsCollection;
use PHPUnit\Framework\TestCase;

class TagsCollectionTest extends TestCase
{
    public function testExtractsTags()
    {
        $tags = [
            'Support',
        ];

        $tagsCollection = new TagsCollection();
        $this->assertInstanceOf(TagsCollection::class, $tagsCollection->setTags($tags));

        $this->assertSame($tags, $tagsCollection->getTags());

        $extracted = $tagsCollection->extract();
        $this->assertArrayHasKey('tags', $extracted);
        $this->assertStringContainsStringIgnoringCase('Support', $extracted['tags'][0]);
    }
}
