<?php

namespace Tests\Feature\Blocks;

use Tests\TestCase;

use Cms\Domain\Blocks\Block;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Organizations\Organization;

class BlockShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
        $this->layout = Layout::factory()->create();
    }

    /** @test */
    public function it_fails_if_a_block_cant_be_found()
    {
        $this->get("/api/organizations/{$this->organization->slug}/blocks/nope")
            ->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_block()
    {
        $block = Block::factory()->create([
            'title' => 'Test block title',
            'layout_id' => $this->layout->id
        ]);

        $this->get("/api/organizations/{$this->organization->slug}/blocks/{$block->uuid}")
            ->assertStatus(200)
            ->assertJsonFragment([
               'title' => 'Test block title'
           ]);
    }
}
