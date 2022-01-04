<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Blocks\Block;

class BlockReorderController extends Controller
{
    public function reorder(Organization $organization, Request $request)
    {
        foreach($request['blocks'] as $index => $block) {
            $storedBlock = Block::firstWhere('uuid', $block['uuid']);

            $storedBlock->update([
                'order' => $index
            ]);
        }
    }
}
