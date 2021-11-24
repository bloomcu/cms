<?php

namespace Cms\Http\Categories;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Categories\Category;

use Cms\Http\Categories\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return CategoryResource::collection(
            Category::get()->toTree()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
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
