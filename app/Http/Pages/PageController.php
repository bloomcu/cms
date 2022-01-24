<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;

// Resources
use Cms\Http\Posts\Resources\PostCollection;

class PageController extends Controller
{

    public function index(Organization $organization, Property $property, Request $request)
    {        
        $pages = $property->pages()
            ->withoutBlueprints()
            ->with('categories')
            ->filter($request)
            ->latest()
            ->get();

        return new PostCollection($pages);
    }
}
