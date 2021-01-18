<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Page;
use App\Models\Company;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Company $company)
    {
        return Page::where('company_id', $company->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Company $company, Page $page)
    {
        return Page::find($page)
            ->load('layout')
            ->load('layout.blocks')
            ->load(['layout.blocks.contents' => function($query) use ($page) {
                $query->where('page_id', $page);
            }])->first();
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
    }
}
