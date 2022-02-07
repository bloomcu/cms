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
        // TODO: Create a request class for this
        $post = Post::where('url', $request['path'])->firstOrFail();

        return new PostResource(
            $post->load([
                'categories',
                'layout',
                'layout.blocks'
            ])
        );
    }
}
