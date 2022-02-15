<?php

namespace Cms\Http\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Posts\Post;

// Actions
use Cms\Domain\Posts\Actions\ReplicatePostAction;

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
        $replicated = ReplicatePostAction::execute($post, [
            'title' => $post->title . ' Copy',
            'is_blueprint' => 0
        ]);

        return new PostResource(
            $replicated->load([
                'categories',
                'blocks'
            ])
        );
    }
}
