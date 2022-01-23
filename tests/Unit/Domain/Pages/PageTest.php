<?php

namespace Tests\Unit\Domain\Pages;

use Tests\TestCase;

use Cms\Domain\Pages\Page;
use Cms\Domain\Properties\Property;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Categories\Category;

class PageTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->page = Page::factory()->create();
    }
    
    // TODO: Test it has a slug
    
    // TODO: Test it has a URL
    
    /** @test */
    public function it_belongs_to_a_property()
    {
        $page = Page::factory()
            ->has(Property::factory())
            ->create();

        $this->assertInstanceOf(Property::class, $page->property);
    }

    /** @test */
    public function it_has_many_layouts()
    {
        $page = Page::factory()
            ->has(Layout::factory())
            ->create();

        $this->assertInstanceOf(Layout::class, $page->layouts->first());
    }
    
    // TODO: Test latest single layout relationship

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
