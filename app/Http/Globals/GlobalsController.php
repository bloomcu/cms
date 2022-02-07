<?php

namespace Cms\Http\Globals;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;

// Resources
use Cms\Http\Globals\Resources\GlobalsResource;

class GlobalsController extends Controller
{
    public function show(Organization $organization, Property $property)
    {
        $globals = $property->load([
            'globalHeader',
            'globalFooter',
        ]);

        return new GlobalsResource($globals);
    }
}
