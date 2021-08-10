<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Organization;
use App\Models\Page;
use App\Models\Block;

use App\Http\Requests\ReplicatePageStoreRequest;

class ReplicatePageController extends Controller
{
    /**
     * Replicate a page
     *
     */
    public function store(Organization $organization, Page $page, Request $request)
    {
        // Replicate page
        $appendTitle = $request['is_blueprint'] ? ' Blueprint' : ' Copy';

        $newPage = $page->replicate()->fill([
            'title' => $page->title . $appendTitle,
            'is_blueprint' => $request['is_blueprint']
        ]);
        $newPage->save();

        // Replicate blocks
        if ( $page->blocks ) {
            foreach( $page->blocks as $block ) {
                $newBlock = $block->replicate()->fill([
                    'uuid'    => (string) Str::uuid(),
                    'page_id' => $newPage->id,
                ]);
                $newBlock->save();
            }
        }

        return $newPage;
    }
}
