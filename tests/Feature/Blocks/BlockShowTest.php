<?php

namespace Tests\Feature\Blocks;

use Tests\TestCase;

use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\BlockResource;

class BlockShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_fails_if_a_block_cant_be_found()
    {
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/blocks/123");
        
        $response->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_block()
    {
        $block = Block::factory()
            ->for($this->property)
            ->state(['title' => 'Test block title'])
            ->create();
        
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/blocks/{$block->uuid}");

        $response
            ->assertStatus(200)
            ->assertJsonFragment(['title' => 'Test block title'])
            ->assertResource(new BlockResource($block));
    }
}
