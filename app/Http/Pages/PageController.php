<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Pages\Page;
use Cms\Domain\Blocks\Block;

use Cms\Http\Pages\Resources\PageCollection;
use Cms\Http\Pages\Resources\PageResource;

// use App\Http\Requests\PageStoreRequest;

class PageController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $pages = $organization->pages()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new PageCollection($pages);
    }

    public function store(Organization $organization, Request $request)
    {
        $page = $organization->pages()->create([
            'title'           => $request['title'],
            'category_id'     => $request['category_id'],
            'organization_id' => $request['organization_id'],
            'is_blueprint'    => $request['is_blueprint'],
        ]);

        return new PageResource($page);
    }

    public function show(Organization $organization, Page $page)
    {
        return new PageResource(
            $page->load(['category', 'wiki'])
        );
    }

    public function update(Organization $organization, Page $page, Request $request)
    {
        $page->update(
            // $request->validated()
            $request->all()
        );

        // TODO: Try using Sync for this
        if ($request['blocks']) {
            foreach($request['blocks'] as $index => $block) {

                $storedBlock = Block::firstWhere('uuid', $block['uuid']);

                $storedBlock->update([
                    'content' => $block['content'],
                    'order' => $index
                ]);
            }
        }

        return new PageResource($page);
    }

    public function destroy(Organization $organization, Page $page)
    {
        $page->delete();
    }
}
