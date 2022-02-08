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

class PostReplicateController extends Controller
{

    public function replicate(Organization $organization, Property $property, Post $post, Request $request)
    {
        // TODO: Create a trait canDuplicate which implements an action belonging
        // to the model called "duplicate[ModelBasename]Action" passing title
        // overide into action.
        
        // Replicate post 
        $newPost = $post->replicate()->fill([
            'title' => $post->title . ' Copy',
            'is_blueprint' => 0
        ]);
        $newPost->save();
        
        // TODO: The afermentioned "duplicatePostAction" will implement a "duplicateLayoutAction"
        
        // Replicate post layout
        if ($post->layout()->exists()) {
            $newLayout = $post->layout->replicate()->fill([
                'title' => $post->layout->title . ' Copy',
                'post_id' => $newPost->id,
            ]);
            $newLayout->save();
            
            // TODO: The afermentioned "duplicateLayoutAction" will implement the "duplicateBlockAction"
            
            // Replicate layout blocks
            if ($post->layout->blocks()->exists()) {
                foreach( $post->layout->blocks as $block ) {
                    $newBlock = $block->replicate()->fill([
                        'uuid' => Str::uuid(),
                        'layout_id' => $newLayout->id,
                    ]);
                    $newBlock->save();
                }
            }
        }

        return new PostResource(
            $newPost->load([
                'categories',
                'layout',
                'layout.blocks'
            ])
        );
    }
}
