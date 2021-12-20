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
// use App\Http\Requests\PageStoreRequest;

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

    public function store(Organization $organization, Request $request)
    {
        $page = $organization->pages()->create(
            // $request->validated()
            $request->all()
        );

        return new PageResource($page);
    }

    public function show(Organization $organization, Page $page)
    {
        // return Page::onlyBlueprints()->find(1);

        return new PageResource(
            $page->load([
                'category',
                'layout',
                'layout.blocks'
            ])
        );
    }

    public function update(Organization $organization, Page $page, Request $request)
    {
        $page->update(
            // $request->validated()
            $request->all()
        );

        return new PageResource($page);
    }

    public function destroy(Organization $organization, Page $page)
    {
        $page->delete();

        return new PageResource($page);
    }
}
