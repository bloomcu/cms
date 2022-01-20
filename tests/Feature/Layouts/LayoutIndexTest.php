<?php

namespace Tests\Feature\Layouts;

use Tests\TestCase;

use Cms\Domain\Layouts\Layout;

use Cms\Http\Layouts\Resources\LayoutCollection;

class LayoutIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_shows_a_collection_of_layouts()
    {
        $layouts = Layout::factory()
            ->for($this->property)
            ->count(3)
            ->create();

        $response = $this->get("/api/organizations/{$this->organization->slug}/properties/{$this->property->slug}/layouts");
        
        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new LayoutCollection($layouts));
    }
    
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
