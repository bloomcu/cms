<?php

namespace Cms\Http\Layouts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Layouts\Layout;

// Resources
use Cms\Http\Layouts\Resources\LayoutResource;

class LayoutPublishController extends Controller
{
     /**
      * Publish the current draft.
      *
      */
     public function store(Organization $organization, Property $property, Layout $layout)
     {
         $publishedLayout = $layout->publishDraft();

         return new LayoutResource($publishedLayout);
     }
}
