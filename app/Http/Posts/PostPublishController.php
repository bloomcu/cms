<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Resources
use Cms\Http\Posts\Resources\PostResource;

class PostPublishController extends Controller
{
    public function publish(Organization $organization, Property $property, Post $post)
    {   
        $post->publish();
        
        return new PostResource($post);
    }
    
    public function unpublish(Organization $organization, Property $property, Post $post)
    {
        $post->unpublish();
        
        return new PostResource($post);
    }
}
