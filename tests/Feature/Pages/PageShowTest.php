<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

class PageShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_fails_if_a_page_cant_be_found()
    {
        $this->get("/api/organizations/{$this->organization->slug}/pages/nope")
            ->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_page()
    {
        $page = Page::factory()->create([
            'title' => 'Test page title',
            'organization_id' => $this->organization->id
        ]);

        $this->get("/api/organizations/{$this->organization->slug}/pages/{$page->id}")
            ->assertStatus(200)
            ->assertJsonFragment([
               'title' => 'Test page title'
           ]);
    }
}
