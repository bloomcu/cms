<?php

namespace Tests\Unit\Domain\Blocks;

use Tests\TestCase;

use Cms\Domain\Blocks\Block;
use Cms\Domain\Properties\Property;
use Cms\Domain\Layouts\Layout;

class BlockTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_has_a_uuid()
    {
        $block = Block::factory()->create();
        
        $this->assertNotNull($block->uuid);
    }

    /** @test */
    public function its_uuid_is_unique()
    {
        $block = Block::factory()->create();
        
        $anotherBlock = Block::factory()->create();

        $this->assertNotEquals(
            $block->uuid,
            $anotherBlock->uuid
        );
    }
    
    /** @test */
    public function it_uses_the_uuid_for_the_route_key_name()
    {
        $block = Block::factory()->create();
        
        $this->assertEquals($block->getRouteKeyName(), 'uuid');
    }
    
    /** @test */
    public function it_belongs_to_a_property()
    {
        $block = Block::factory()
            ->has(Property::factory())
            ->create();

        $this->assertInstanceOf(Property::class, $block->property);
    }
    
    /** @test */
    public function it_can_belong_to_a_layout()
    {
        $block = Block::factory()
            ->has(Layout::factory())
            ->create();

        $this->assertInstanceOf(Layout::class, $block->layout);
    }
}
