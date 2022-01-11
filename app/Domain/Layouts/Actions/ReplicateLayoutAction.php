<?php

namespace Cms\Domain\Layouts\Actions;

use Cms\Domain\Layouts\Layout;

use Cms\Domain\Blocks\Actions\ReplicateBlockAction;

class ReplicateLayoutAction
{
    public static function execute(Layout $layout, array $replaceAttributes = []): Layout
    {
        $attributes = array_replace($layout->getAttributes(), $replaceAttributes);

        $replicated = $layout->replicate()->fill($attributes);

        $replicated->save();

        foreach($layout->blocks as $block) {
            ReplicateBlockAction::execute($block, [
                'layout_id'  => $replicated->id,
                'created_at' => now(),
            ]);
        }

        return $replicated;
    }
}
