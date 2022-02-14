<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Spatie\QueryBuilder\QueryBuilder;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;
use Cms\Domain\Blocks\Block; // TODO: Remove

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
        $posts = QueryBuilder::for(Post::class)
            ->where('property_id', $property->id)
            ->allowedFilters([
                'is_blueprint',
                'type', 
                'categories.id',
            ])
            ->with('categories')
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
                'layout' => function($query) {
                    $query->drafted();
                },
                'layout.blocks',
                'categories',
            ])
        );
    }

    public function update(Organization $organization, Property $property, Post $post, PostUpdateRequest $request)
    {
        $post->update(
            $request->validated()
        );
        
        // TODO: Remove once layouts and blocks are updated via their own endpoints from the admin ui
        if ($request['layout']) {
            foreach($request['layout']['blocks'] as $key => $block) {
                $b = Block::firstOrNew(['uuid' => $block['uuid']], $block);
                
                $b->property_id = $property->id;
                $b->layout_id = $request['layout']['id'];
                $b->order = $key;
                $b->data = $block['data'];
                
                $b->save();
            }
            
            $post->layout()->drafted()->touch();
        }
        
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
