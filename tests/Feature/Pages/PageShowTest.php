<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

use Cms\Domain\Pages\Page;

use Cms\Http\Pages\Resources\PageResource;

class PageShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_fails_if_a_page_cant_be_found()
    {
        $response = $this->get("/api/organizations/{$this->organization->slug}/properties/{$this->property->slug}/pages/123");
        
        $response->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_page()
    {    
        $page = Page::factory()
            ->for($this->property)
            ->state(['title' => 'Test page title'])
            ->create();

        $this->get("/api/organizations/{$this->organization->slug}/properties/{$this->property->slug}/pages/{$page->id}")
            ->assertStatus(200)
            ->assertJsonFragment(['title' => 'Test page title'])
            ->assertResource(new PageResource($page));
    }
    
    // TODO: Test it shows a page with its category relationship
    
    // TODO: Test it shows a page with its layout relationship
    
    // TODO: Test it shows a page with its layout and blocks
}
