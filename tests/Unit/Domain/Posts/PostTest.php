<?php

namespace Tests\Unit\Domain\Posts;

use Tests\TestCase;

use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;
use Cms\Domain\Blocks\Block;
use Cms\Domain\Categories\Category;

class PostTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
    
    // TODO: Test it has a slug
    
    // TODO: Test it has a URL
    
    /** @test */
    public function it_belongs_to_a_property()
    {
        $post = Post::factory()
            ->has(Property::factory())
            ->create();

        $this->assertInstanceOf(Property::class, $post->property);
    }

    /** @test */
    public function it_has_many_blocks()
    {
        $post = Post::factory()
            ->has(Block::factory()->count(3))
            ->create();
            
        $this->assertInstanceOf(Block::class, $post->blocks->first());
    }

    /** @test */
    public function its_blocks_are_ordered()
    {
        $post = Post::factory()->create();
            
        $post->blocks()->save(
            Block::factory()->create(['title' => 'Block Two', 'order' => 2])
        );

        $post->blocks()->save(
            Block::factory()->create(['title' => 'Block One', 'order' => 1])
        );

        $this->assertStringContainsString('Block Two', $post->blocks()->pluck('title'));
    }

    /** @test */
    // public function it_belongs_to_a_category()
    // {
    //     $page = Page::factory()
    //         ->has(Category::factory())
    //         ->create();
    // 
    //     $this->assertInstanceOf(Category::class, $page->category);
    // }
}
