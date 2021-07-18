<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Company;
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
        return $company->pages()->create(
            // $request->validated()
            $request->all()
        );
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
