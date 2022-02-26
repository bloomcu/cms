<?php

namespace Cms\Domain\Posts\Actions;

use Illuminate\Support\Str;

use Cms\Domain\Posts\Post;
use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\Actions\ReplicateBlockAction;

class ReplicatePostAction
{
    public static function execute(Post $post, array $replaceAttributes = []): Post
    {
        $attributes = array_replace($post->getAttributes(), $replaceAttributes);

        $replicated = $post->replicate()->fill($attributes);

        $replicated->save();

        foreach($post->blocks as $block) {
            // $block->uuid = Str::uuid();
            // $block->post_id = $replicated->id;
            // $block->created_at = now();
            // $newBlock = Block::create($block->getAttributes());
            
            ReplicateBlockAction::execute($block, [
                'post_id'  => $replicated->id,
                'created_at' => now(),
            ]);
        }

        return $replicated;
    }
}
