<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Layout;

class LayoutBlocksController extends Controller
{
    /**
     * Update layout blocks
     *
     */
    public function update(Layout $layout, Request $request)
    {
        /**
         * Build associative array of block ids and their order
         * Example:
         * $blocks = [
         *     1 => ['order' => 0],
         *     2 => ['order' => 1],
         *     3 => ['order' => 2]
         * ];
         */
        $blocks = [];

        // foreach ($request['blocks'] as $key => $block) {
        //     $blocks[$block['id']] = ['order' => $key];
        // }
        foreach ($request['blocks'] as $key => $block) {
            $blocks[$block['pivot']['id']] = [
                'block_id' => $block['id'],
                'order' => $key
            ];
        }

        // return $blocks;

        // Sync layout's blocks
        return $layout->blocks()->sync(
            $blocks
        );
    }
}
