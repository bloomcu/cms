<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Page;
use App\Models\Company;

use App\Http\Requests\PageStoreRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Company $company, Request $request)
    {
        return Page::where('company_id', $company->id)
            ->filter($request)
            ->with('category:id,title')
            ->with('type:id,title')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Company $company, PageStoreRequest $request)
    {
        return $company->pages()
            ->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Company $company, Page $page)
    {
        return Page::find($page->id)
            ->load('layout')
            ->load('layout.blocks')
            ->load(['layout.blocks.contents' => function($query) use ($page) {
                $query->where('page_id', $page->id);
            }]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Company $company, Page $page, PageStoreRequest $request)
    {
        return Page::where('id', $page->id)
            ->update($request->validated());
    }

    public function updateBatch(Company $company, Request $request)
    {
        return Page::whereIn('id', $request->page_ids)
            ->update([
                'category_id' => $request->category_id
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Company $company, Page $page)
    {
        return Page::where('id', $page->id)->delete();
    }
}
