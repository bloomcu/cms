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
            // Category::whereIsRoot()->get()
            Category::parents()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $category = Category::create(
            // $request->validated()
            $request->all()
        );

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Category $category)
    {
        // return $category->tree()->get()->toTree();

        return CategoryResource::collection(
            // $category->tree()->get()->toTree()
            $category->descendantsAndSelf()->get()->toTree()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Category $category, Request $request)
    {
        return Category::rebuildSubtree($category, $request['children']);
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
