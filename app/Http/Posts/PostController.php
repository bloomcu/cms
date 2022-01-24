<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Resources
use Cms\Http\Posts\Resources\PostResource;
use Cms\Http\Posts\Resources\PostCollection;

// Requests
use Cms\Http\Posts\Requests\PostStoreRequest;
use Cms\Http\Posts\Requests\PostUpdateRequest;

class PostController extends Controller
{

    public function index(Organization $organization, Property $property, Request $request)
    {
        $posts = $property->posts()
            ->withoutBlueprints()
            ->with('categories')
            ->filter($request)
            ->latest()
            ->get();

        return new PostCollection($posts);
    }

    public function store(Organization $organization, Property $property, PostStoreRequest $request)
    {
        $post = $property->posts()->create(
            $request->validated()
        );
        
        if ($request->category) {
            $post->syncCategories($request->category);
        }

        return new PostResource(
            $post->load(['categories'])
        );
    }

    public function show(Organization $organization, Property $property, Post $post)
    {
        return new PostResource(
            $post->load([
                'categories',
                'layout',
                'layout.blocks'
            ])
        );
    }

    public function update(Organization $organization, Property $property, Post $post, PostUpdateRequest $request)
    {
        $post->update(
            $request->validated()
        );

        return new PostResource(
            $post->load(['categories'])
        );
    }

    public function destroy(Organization $organization, Property $property, Post $post)
    {
        $post->delete();

        return new PostResource(
            $post->load(['categories'])
        );
    }
}
