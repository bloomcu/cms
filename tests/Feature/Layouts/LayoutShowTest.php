<?php

namespace Tests\Feature\Layouts;

use Tests\TestCase;

use Cms\Domain\Layouts\Layout;

use Cms\Http\Layouts\Resources\LayoutResource;

class LayoutShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_fails_if_a_layout_cant_be_found()
    {
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/layouts/123");
        
        $response->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_layout()
    {
        $layout = Layout::factory()
            ->for($this->property)
            ->state(['title' => 'Test layout title'])
            ->create();
        
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/layouts/{$layout->id}");
        
        $response
            ->assertStatus(200)
            ->assertJsonFragment(['title' => 'Test layout title'])
            ->assertResource(new LayoutResource($layout));
    }
    
    // TODO: Test it shows a layout with its category relationship
    
    // TODO: Test it shows a layout with its blocks relationship
    
    // TODO: Test it shows a layout with its draft relationship
}
