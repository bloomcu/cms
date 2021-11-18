<?php

namespace Tests\Unit\Domain\Pages;

use Tests\TestCase;
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Categories\Category;

class PageTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->page = Page::factory()->create();
    }

    /** @test */
    public function it_belongs_to_an_organization()
    {
        $page = Page::factory()->create([
            'organization_id' => Organization::factory()->create()->id
        ]);

        $this->assertInstanceOf(Organization::class, $page->organization);
    }

    /** @test */
    public function it_has_many_layouts()
    {
        $this->page->layouts()->save(
            Layout::factory()->create()
        );

        $this->assertInstanceOf(Layout::class, $this->page->layouts->first());
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $page = Page::factory()->create([
            'category_id' => Category::factory()->create()->id
        ]);

        $this->assertInstanceOf(Category::class, $page->category);
    }
}
