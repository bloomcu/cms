<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Requests
use Cms\Http\Posts\Requests\PostCheckSlugRequest;

class PostSlugController extends Controller
{
    public function check(Organization $organization, Property $property, PostCheckSlugRequest $request)
    {
        $query = Post::where('slug', '=', $request->slug);

        return response()->json([
            'data' => [
                'unique' => !$query->exists(),

                // TODO: Maybe also return the post resource using slug if not unique
            ]
        ]);
    }
}
