<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Pages\Page;

// Resources
use Cms\Http\Pages\Resources\PageResource;

class PageReplicateController extends Controller
{

    public function replicate(Organization $organization, Property $property, Page $page, Request $request)
    {
        // TODO: Create a trait canDuplicate which implements an action belonging
        // to the model called "duplicate[ModelBasename]Action" passing title
        // overide into action.
        
        // Replicate page 
        $newPage = $page->replicate()->fill([
            'title' => $page->title . ' Copy',
        ]);
        $newPage->save();
        
        // TODO: The afermentioned "duplicatePageAction" will implement a "duplicateLayoutAction"
        
        // Replicate page layout
        if ($page->layout()->exists()) {
            $newLayout = $page->layout->replicate()->fill([
                'title' => $page->layout->title . ' Copy',
                'page_id' => $newPage->id,
            ]);
            $newLayout->save();
            
            // TODO: The afermentioned "duplicateLayoutAction" will implement the "duplicateBlockAction"
            
            // Replicate layout blocks
            if ($page->layout->blocks()->exists()) {
                foreach( $page->layout->blocks as $block ) {
                    $newBlock = $block->replicate()->fill([
                        'uuid' => Str::uuid(),
                        'layout_id' => $newLayout->id,
                    ]);
                    $newBlock->save();
                }
            }
        }

        return new PageResource(
            $newPage->load([
                'category',
                'layout',
                'layout.blocks'
            ])
        );
    }
}
