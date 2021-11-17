<?php

namespace Tests\Unit\Domain\Blocks;

use Tests\TestCase;
use Cms\Domain\Blocks\Block;
use Cms\Domain\Layouts\Layout;

class BlockTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->block = Block::factory()->create();
    }

    /** @test */
    public function it_has_a_uuid()
    {
        $this->assertNotNull($this->block->uuid);
    }

    /** @test */
    public function its_uuid_is_unique()
    {
        $anotherBlock = Block::factory()->create();

        $this->assertNotEquals(
            $this->block->uuid,
            $anotherBlock->uuid
        );
    }

    /** @test */
    public function it_belongs_to_a_layout()
    {
        $block = Block::factory()->create([
            'layout_id' => Layout::factory()->create()->id
        ]);

        $this->assertInstanceOf(Layout::class, $block->layout);
    }
}
