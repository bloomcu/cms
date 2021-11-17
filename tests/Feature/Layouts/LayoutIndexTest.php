<?php

namespace Tests\Feature\Layouts;

use Tests\TestCase;

use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;

use Cms\Http\Layouts\Resources\LayoutCollection;

class LayoutIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_shows_a_collection_of_layouts()
    {
        $this->organization->layouts()->saveMany(
            Layout::factory()->count(3)->create()
        );

        $response = $this->get("/api/organizations/{$this->organization->slug}/layouts");

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new LayoutCollection($this->organization->layouts));
    }

    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/pages')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
