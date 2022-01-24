<?php

namespace Tests\Unit\Domain\Posts;

use Tests\TestCase;

use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Categories\Category;

class PostTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->post = Post::factory()->create();
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
    public function it_has_many_layouts()
    {
        $post = Post::factory()
            ->has(Layout::factory())
            ->create();

        $this->assertInstanceOf(Layout::class, $post->layouts->first());
    }
    
    // TODO: Test latest single layout relationship

    /** @test */
    public function it_belongs_to_a_category()
    {
        $post = Post::factory()
            ->has(Category::factory())
            ->create();

        $this->assertInstanceOf(Category::class, $post->category);
    }
}
