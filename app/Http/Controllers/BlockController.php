<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Block;

// use App\Http\Requests\PageStoreRequest;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Block::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    // public function store(Company $company, BlockStoreRequest $request)
    // {
    //     return $company->pages()
    //         ->create($request->validated());
    // }

    /**
     * Display the specified resource.
     *
     */
    // public function show(Company $company, Page $page)
    // {
    //     return Page::find($page->id)
    //         ->load('layout')
    //         ->load('layout.blocks')
    //         ->load(['layout.blocks.contents' => function($query) use ($page) {
    //             $query->where('page_id', $page->id);
    //         }]);
    // }

    /**
     * Update the specified resource in storage.
     *
     */
    // public function update(Company $company, Page $page, PageStoreRequest $request)
    // {
    //     return Page::where('id', $page->id)
    //         ->update($request->validated());
    // }

    // public function updateBatch(Company $company, Request $request)
    // {
    //     if ($request->category_id) {
    //         return Page::whereIn('id', $request->page_ids)
    //             ->update([
    //                 'category_id' => $request->category_id
    //             ]);
    //     }
    //
    //     if ($request->type_id) {
    //         return Page::whereIn('id', $request->page_ids)
    //             ->update([
    //                 'type_id' => $request->type_id
    //             ]);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     */
    // public function destroy(Company $company, Page $page)
    // {
    //     return Page::where('id', $page->id)->delete();
    // }
}
