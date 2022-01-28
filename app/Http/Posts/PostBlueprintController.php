<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Resources
use Cms\Http\Posts\Resources\PostCollection;

class PostBlueprintController extends Controller
{

    public function index(Organization $organization, Property $property, Request $request)
    {
        $posts = $property->posts()
            ->onlyBlueprints()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new PostCollection($posts);
    }
}
