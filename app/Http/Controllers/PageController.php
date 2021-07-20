<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Models\Page;
use App\Models\Block;
// use App\Http\Requests\PageStoreRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Company $company, Request $request)
    {
        return Page::where('company_id', $company->id)
            ->where('is_blueprint', false)
            ->with('category:id,title')
            ->with('type:id,title')
            ->filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Company $company, Request $request)
    {
        $page = $company->pages()->create(
            // $request->validated()
            $request['page']
        );

        if ($request['blocks']) {
            foreach($request['blocks'] as $index => $block) {
                Block::create([
                    'uuid'      => (string) Str::uuid(),
                    'title'     => $block['title'],
                    'component' => $block['component'],
                    'page_id'   => $page->id,
                    'order'     => $index,
                    'content'   => $block['content']
                ]);
            }
        }

        return $page;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Company $company, Page $page)
    {
        return $page
            ->load('category')
            ->load('blocks')
            ->load('wiki');

        // return $page
        //     ->load('category')
        //     ->load('layout')
        //     ->load('layout.blocks')
        //     ->load('wiki');

        // return $page
        //     ->load('category')
        //     ->load('layout')
        //     ->load('layout.blocks')
        //     ->load(['layout.blocks.contents' => function($query) use ($page) {
        //         $query->where('contents.page_id', $page->id);
        //     }]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Company $company, Page $page, Request $request)
    {
        $page->update(
            // $request->validated()
            $request->all()
        );

        if ($request['blocks']) {
            foreach($request['blocks'] as $index => $block) {

                $storedBlock = Block::firstWhere('uuid', $block['uuid']);

                $storedBlock->update([
                    'content' => $block['content'],
                    'order' => $index
                ]);
            }
        }

        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Company $company, Page $page)
    {
        $page->delete();

        return $page;
    }
}
