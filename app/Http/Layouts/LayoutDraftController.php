<?php

namespace Cms\Http\Layouts;

use Illuminate\Http\Request;

use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;

use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Layouts\Resources\LayoutResource;

class LayoutDraftController extends Controller
{
     /**
      * Store a copy of the layout as a draft.
      *
      */
     public function store(Organization $organization, Layout $layout)
     {
         $draft = $layout->createDraft();

         return new LayoutResource($draft);
     }

    /**
    * Show the current draft for this layout.
    *
    */
    public function show(Organization $organization, Layout $layout)
    {
        // TODO: We probably don't need this show method, as a page might load
        // it's layout draft by default in the Admin controller.

        $draft = $layout->showDraft();

        return new LayoutResource(
            $draft->load([
                'category',
                'blocks',
                'draft'
            ])
        );
    }
}
