<?php

namespace Tests\Feature\Posts;

use Tests\TestCase;

use Cms\Domain\Posts\Post;

use Cms\Http\Posts\Resources\PostResource;

class PublicPostShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_fails_if_a_post_cant_be_found()
    {
        $post = Post::factory()
            ->for($this->property)
            ->state(['title' => 'Homepage'])
            ->create();
        
        $post->publish();
        
        $response = $this->get("/api/public/{$this->property->id}/posts?path=nope");
    
        $response->assertStatus(404);
    }

    /** @test */
    public function test_it_shows_a_published_post()
    {    
        $post = Post::factory()
            ->for($this->property)
            ->state(['title' => 'Homepage'])
            ->create();
    
        $post->publish();
    
        $response = $this->get("/api/public/{$this->property->id}/posts?path=homepage");
    
        $response
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $post->title]);
    }
    
    // TODO: Test it shows a post with its category relationship
    
    // TODO: Test it shows a post with its post relationship
    
    // TODO: Test it shows a post with its post and blocks
}
