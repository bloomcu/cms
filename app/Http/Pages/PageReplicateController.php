<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

// Resources
use Cms\Http\Pages\Resources\PageResource;

// Requests
// use Cms\Http\Pages\Requests\ReplicatePageStoreRequest;

class PageReplicateController extends Controller
{

    public function replicate(Organization $organization, Page $page, Request $request)
    {

        // Replicate page
        $new_page = $page->replicate()->fill([
            'title' => $page->title . ' Copy',
        ]);
        $new_page->save();


        if ( $page->layout()->exists() ) {

            // Replicate page's layout
            $new_layout = $page->layout->replicate()->fill([
                'title' => $page->layout->title . ' Copy',
                'page_id' => $new_page->id,
            ]);
            $new_layout->save();

            if ( $page->layout->blocks()->exists() ) {

                // Replicate layout's blocks
                foreach( $page->layout->blocks as $block ) {
                    $new_block = $block->replicate()->fill([
                        'uuid' => Str::uuid(),
                        'layout_id' => $new_layout->id,
                    ]);
                    $new_block->save();
                }
            }

        }

        return new PageResource(
            $new_page->load([
                'category',
                'layout',
                'layout.blocks'
            ])
        );
    }
}
