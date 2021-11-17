<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

use Cms\Http\Pages\Resources\PageCollection;

class PageIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_shows_a_collection_of_pages()
    {
        $this->organization->pages()->saveMany(
            Page::factory()->count(3)->create()
        );

        $response = $this->get("/api/organizations/{$this->organization->slug}/pages");

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new PageCollection($this->organization->pages));
    }

    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/pages')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
