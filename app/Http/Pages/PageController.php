<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Pages\Page;

// Resources
use Cms\Http\Pages\Resources\PageResource;
use Cms\Http\Pages\Resources\PageCollection;

// Requests
use Cms\Http\Pages\Requests\PageStoreRequest;
use Cms\Http\Pages\Requests\PageUpdateRequest;

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

        return new PageCollection($pages);
    }

    public function store(Organization $organization, Property $property, PageStoreRequest $request)
    {
        $page = $property->pages()->create(
            $request->validated()
        );
        
        if ($request->category) {
            $page->syncCategories($request->category);
        }
        
        return new PageResource(
            $page->load(['categories'])
        );
    }

    public function show(Organization $organization, Property $property, Page $page)
    {        
        return new PageResource(
            $page->load([
                'categories',
                'layout',
                'layout.blocks'
            ])
        );
    }

    public function update(Organization $organization, Property $property, Page $page, PageUpdateRequest $request)
    {
        $page->update(
            $request->validated()
        );
        
        if ($request->category) {
            $page->syncCategories($request->category);
        }

        return new PageResource(
            $page->load(['categories'])
        );
    }

    public function destroy(Organization $organization, Property $property, Page $page)
    {
        $page->delete();

        return new PageResource(
            $page->load(['categories'])
        );
    }
}
