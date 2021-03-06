<?php

namespace Cms\Domain\Blocks\Actions;

use Illuminate\Support\Str;

use Cms\Domain\Blocks\Block;

class ReplicateBlockAction
{
    public static function execute(Block $block, array $replace = []): Block
    {
        $attributes = array_replace($block->getAttributes(), $replace);

        $replicated = $block->replicate()->fill($attributes);
        
        $replicated->uuid = Str::uuid();
        // dd($replicated->data);
        // TODO: Rename data to content
        // $replicated->data = json_decode($replicated->data, true);
        // $replicated->data = json_encode($replicated->data);
        
        $replicated->save();
        
        return $replicated;
    }
}
