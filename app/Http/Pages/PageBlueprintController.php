<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

// Resources
use Cms\Http\Pages\Resources\PageCollection;

class PageBlueprintController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $pages = $organization->pages()
            ->onlyBlueprints()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new PageCollection($pages);
    }
}
