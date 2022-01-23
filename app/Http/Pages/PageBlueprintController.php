<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Pages\Page;

// Resources
use Cms\Http\Pages\Resources\PageCollection;

class PageBlueprintController extends Controller
{

    public function index(Organization $organization, Property $property, Request $request)
    {
        $pages = $property->pages()
            ->onlyBlueprints()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new PageCollection($pages);
    }
}
