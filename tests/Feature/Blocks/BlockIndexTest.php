<?php

namespace Tests\Feature\Blocks;

use Tests\TestCase;

use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\IndexBlockResource;

class BlockIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_shows_a_collection_of_blocks()
    {
        $blocks = Block::factory()
            ->for($this->property)
            ->count(3)
            ->create();
        
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/blocks");
        
        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }
    
    // TODO: Test it applies filters
    
    // TODO: Test it returns latest first
    
    // TODO: Test it has paginated data
    /** @test */
    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/blocks')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
