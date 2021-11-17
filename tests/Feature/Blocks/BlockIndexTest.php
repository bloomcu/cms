<?php

namespace Tests\Feature\Blocks;

use Tests\TestCase;

use Cms\Domain\Blocks\Block;
use Cms\Http\Blocks\Resources\BlockCollection;
use Cms\Domain\Organizations\Organization;

class BlockIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_shows_a_collection_of_blocks()
    {
        $blocks = Block::factory()->count(3)->create();

        $response = $this->get("/api/organizations/{$this->organization->slug}/blocks");

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new BlockCollection($blocks));
    }

    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/blocks')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
