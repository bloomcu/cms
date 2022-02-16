<?php

namespace Tests\Feature\Posts;

use Tests\TestCase;

use Cms\Domain\Posts\Post;

use Cms\Http\Posts\Resources\PostResource;

class PostShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_fails_if_a_post_cant_be_found()
    {
        $response = $this->get("/api/{$this->organization->slug}/{$this->property->slug}/posts/123");
        
        $response->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_post()
    {    
        $post = Post::factory()
            ->for($this->property)
            ->state(['title' => 'Test post title'])
            ->create();

        $this->get("/api/{$this->organization->slug}/{$this->property->slug}/posts/{$post->id}")
            ->assertStatus(200)
            ->assertJsonFragment(['title' => 'Test post title']);
            
            // TODO: Why is the resource assertion not working?
            // ->assertResource(new PostResource($post));
    }
    
    // TODO: Test it shows a post with its category relationship
    
    // TODO: Test it shows a post with its post relationship
    
    // TODO: Test it shows a post with its post and blocks
}
