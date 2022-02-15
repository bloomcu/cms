<?php

namespace Cms\Http\PublicApi;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Resources
use Cms\Http\Posts\Resources\PostResource;

class PublicPostController extends Controller
{
    public function show(Property $property, Request $request)
    {
        $post = Post::published()->where('url', $request['path'])->first();
        
        if (!$post) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        
        return new PostResource(
            $post->load(['blocks'])
        );
    }
}
