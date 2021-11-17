<?php

namespace Tests\Unit\Domain\Layouts;

use Tests\TestCase;
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Frameworks\Framework;
use Cms\Domain\Wikis\Wiki;
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
    public function it_belongs_to_an_organization()
    {
        $layout = Layout::factory()->create([
            'organization_id' => Organization::factory()->create()->id
        ]);

        $this->assertInstanceOf(Organization::class, $layout->organization);
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $page = Page::factory()->create([
            'category_id' => Category::factory()->create()->id
        ]);

        $this->assertInstanceOf(Category::class, $page->category);
    }

    /** @test */
    public function it_belongs_to_a_framework()
    {
        $layout = Layout::factory()->create([
            'framework_id' => Framework::factory()->create()->id
        ]);

        $this->assertInstanceOf(Framework::class, $layout->framework);
    }

    /** @test */
    public function it_has_many_blocks()
    {
        $this->layout->blocks()->save(
            Block::factory()->create()
        );

        $this->assertInstanceOf(Block::class, $this->layout->blocks->first());
    }

    /** @test */
    public function its_blocks_are_retrieved_in_order()
    {
        $this->layout->blocks()->save(
            Block::factory()->create(['title' => 'Block Two', 'order' => 2])
        );

        $this->layout->blocks()->save(
            Block::factory()->create(['title' => 'Block One', 'order' => 1])
        );

        $this->assertStringContainsString('Block Two', $this->layout->blocks()->pluck('title'));
    }
}
