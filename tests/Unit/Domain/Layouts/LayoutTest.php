<?php

namespace Tests\Unit\Domain\Layouts;

use Tests\TestCase;

use Cms\Domain\Layouts\Layout;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;
use Cms\Domain\Categories\Category;
use Cms\Domain\Blocks\Block;

class LayoutTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->layout = Layout::factory()->create();
    }

    /** @test */
    public function it_belongs_to_a_property()
    {
        $layout = Layout::factory()
            ->has(Property::factory())
            ->create();

        $this->assertInstanceOf(Property::class, $layout->property);
    }
    
    /** @test */
    public function it_belongs_to_a_post()
    {
        $layout = Layout::factory()
            ->has(Post::factory())
            ->create();

        $this->assertInstanceOf(Post::class, $layout->post);
    }

    /** @test */
    // public function it_belongs_to_a_category()
    // {
    //     $layout = Layout::factory()
    //         ->has(Category::factory())
    //         ->create();
    // 
    //     $this->assertInstanceOf(Category::class, $layout->category);
    // }

    /** @test */
    public function it_has_many_blocks()
    {
        $layout = Layout::factory()
            ->has(Block::factory()->count(3))
            ->create();

        $this->assertInstanceOf(Block::class, $layout->blocks->first());
    }

    /** @test */
    public function its_blocks_are_ordered()
    {
        $layout = Layout::factory()->create();
            
        $layout->blocks()->save(
            Block::factory()->create(['title' => 'Block Two', 'order' => 2])
        );

        $layout->blocks()->save(
            Block::factory()->create(['title' => 'Block One', 'order' => 1])
        );

        $this->assertStringContainsString('Block Two', $layout->blocks()->pluck('title'));
    }
}
