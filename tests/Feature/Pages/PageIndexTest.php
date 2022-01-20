<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

use Cms\Domain\Pages\Page;

use Cms\Http\Pages\Resources\PageCollection;

class PageIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_shows_a_collection_of_pages()
    {
        $pages = Page::factory()
            ->for($this->property)
            ->count(3)
            ->create();

        $response = $this->get("/api/organizations/{$this->organization->slug}/properties/{$this->property->slug}/pages");

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new PageCollection($pages));
    }
    
    // TODO: Test it does not include blueprint pages
    
    // TODO: Test it includes category relationships
    
    // TODO: Test it applies filters
    
    // TODO: Test it returns latest first
    
    // TODO: Test it has paginated data
    /** @test */
    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/pages')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
