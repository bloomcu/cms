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

class LayoutDraftController extends Controller
{
     /**
      * Make a drafted copy
      *
      */
     public function draft(Organization $organization, Property $property, Layout $layout)
     {
         // Can this be named "draft" instead of "undraft"?
         $drafted = $layout->draft();

         return new LayoutResource($drafted);
     }
     
     /**
      * Make an undrafted copy
      *
      */
     public function undraft(Organization $organization, Property $property, Layout $layout)
     {
         $undrafted = $layout->undraft();

         return new LayoutResource($undrafted);
     }
}
