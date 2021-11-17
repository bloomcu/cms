<?php

namespace Tests\Feature\Layouts;

use Tests\TestCase;

use Cms\Domain\Layouts\Layout;
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

class LayoutShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
        $this->page = Page::factory()->create();
    }

    /** @test */
    public function it_fails_if_a_layout_cant_be_found()
    {
        $this->get("/api/organizations/{$this->organization->slug}/layouts/nope")
            ->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_layout()
    {
        $layout = Layout::factory()->create([
            'title' => 'Test layout title',
            'organization_id' => $this->organization->id,
            'page_id' => $this->organization->id
        ]);

        $this->get("/api/organizations/{$this->organization->slug}/layouts/{$layout->id}")
            ->assertStatus(200)
            ->assertJsonFragment([
               'title' => 'Test layout title'
           ]);
    }
}
