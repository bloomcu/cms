<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Layout;
use App\Models\Block;

class LayoutReplicateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
     public function replicate(Layout $layout)
     {
         // Replicate the layout
         $cloned_layout = $layout->replicate()->fill([
             'title' => $layout->title . ' Copy'
         ]);

         $cloned_layout->save();

         // Replicate each layout block
         foreach ($layout->blocks as $block) {
             $cloned_block = $block->replicate()->fill([
                 'uuid' => (string) Str::uuid(),
                 'layout_id' => $cloned_layout->id,
                 'content' => $block->content
             ]);

             $cloned_block->save();
         }

         return $cloned_layout;
     }
}
