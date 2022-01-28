<?php

namespace Tests\Feature\Posts;

use Tests\TestCase;

use Cms\Domain\Posts\Post;

use Cms\Http\Posts\Resources\PostCollection;

class PostIndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_shows_a_collection_of_posts()
    {
        $posts = Post::factory()
            ->for($this->property)
            ->count(3)
            ->create();

        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/posts");

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertResource(new PostCollection($posts));
    }
    
    // TODO: Test it does not include blueprint posts
    
    // TODO: Test it includes category relationships
    
    // TODO: Test it applies filters
    
    // TODO: Test it returns latest first
    
    // TODO: Test it has paginated data
    /** @test */
    // public function test_it_has_paginated_data()
    // {
    //     $this->json('GET', 'api/posts')
    //         ->assertJsonStructure([
    //             'meta'
    //         ]);
    // }
}
