<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Blocks\Block;

// Resources
use Cms\Http\Blocks\Resources\IndexBlockResource;

class BlockBlueprintController extends Controller
{
    public function index(Organization $organization, Property $property, Request $request)
    {
        $blocks = $property->blocks()
            ->onlyBlueprints()
            ->filter($request)
            ->latest()
            ->get();
        
        return IndexBlockResource::collection($blocks);
    }
}
