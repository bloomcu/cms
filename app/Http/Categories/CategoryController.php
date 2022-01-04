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
            // TODO: Use FormRequest for request validation
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
        return CategoryResource::collection(
            Category::defaultOrder()->descendantsAndSelf($category->id)->toTree()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Category $category, Request $request)
    {
        Category::rebuildSubtree($category, $request['children']);
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
