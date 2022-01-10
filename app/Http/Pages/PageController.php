<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Pages\Page;
use Cms\Domain\Organizations\Organization;

// Resources
use Cms\Http\Pages\Resources\PageResource;
use Cms\Http\Pages\Resources\PageCollection;

// Requests
use Cms\Http\Pages\Requests\PageStoreRequest;
use Cms\Http\Pages\Requests\PageUpdateRequest;

class PageController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $pages = $organization->pages()
            ->withoutBlueprints()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new PageCollection($pages);
    }

    public function store(Organization $organization, PageStoreRequest $request)
    {
        $page = $organization->pages()->create(
            $request->validated()
        );

        return new PageResource($page);
    }

    public function show(Organization $organization, Page $page)
    {
        return new PageResource(
            $page->load([
                'category',
                'layout',
                'layout.blocks'
            ])
        );
    }

    public function update(Organization $organization, Page $page, PageUpdateRequest $request)
    {
        $page->update(
            $request->validated()
        );

        return new PageResource($page);
    }

    public function destroy(Organization $organization, Page $page)
    {
        $page->delete();

        return new PageResource($page);
    }
}
