<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Layout;

use App\Http\Requests\LayoutStoreRequest;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Layout::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    // public function store(Company $company, PageStoreRequest $request)
    // {
    //     return $company->pages()
    //         ->create($request->validated());
    // }

    /**
     * Display the specified resource.
     *
     */
    public function show(Layout $layout)
    {
        return Layout::find($layout->id)
            ->load('blocks');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Layout $layout, LayoutStoreRequest $request)
    {
        return Layout::where('id', $layout->id)
            ->update($request->validated());
    }

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
