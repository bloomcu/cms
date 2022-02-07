<?php

namespace Cms\Http\PublicApi;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Properties\Property;

// Resources
use Cms\Http\Globals\Resources\GlobalsResource;

class PublicGlobalsController extends Controller
{
    public function show(Property $property)
    {
        $globals = $property->load([
            'globalHeader',
            'globalFooter',
        ]);

        return new GlobalsResource($globals);
    }
}
