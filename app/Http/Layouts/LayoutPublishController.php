<?php

namespace Cms\Http\Layouts;

use Illuminate\Http\Request;

use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;

use Cms\Http\Layouts\Resources\LayoutResource;

class LayoutPublishController extends Controller
{
     /**
      * Publish the current draft.
      *
      */
     public function store(Organization $organization, Layout $layout)
     {
         $publishedLayout = $layout->publishDraft();

         return new LayoutResource($publishedLayout);
     }
}
