<?php

namespace Cms\Http\Categories;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Categories\Category;

// Resources
use Cms\Http\Categories\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Organization $organization, Property $property)
    {
        $parents = $property->categories()
            ->parents()
            ->get();
        
        return CategoryResource::collection($parents);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Organization $organization, Property $property, Request $request)
    {
        $category = $property->categories()->create(
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
    public function show(Organization $organization, Property $property, Category $category)
    {
        $category = Category::defaultOrder()->descendantsAndSelf($category->id)->toTree();
        
        return CategoryResource::collection($category);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Organization $organization, Property $property, Category $category, Request $request)
    {
        Category::rebuildSubtree($category, $request['children']);
        
        $category = Category::defaultOrder()
            ->descendantsAndSelf($category->id)
            ->toTree();
        
        return CategoryResource::collection($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Organization $organization, Property $property, Category $category)
    {
        // TODO: Categories in use cannot be destroyed unless
        // models using category are uncategorized. Let's make a
        // trait "IsCategorizable" that can be assigned to models.
        // Trait sets up a polymorphic relation. That way, when
        // a category is destroyed we can can remove the relationships
        // associated with the category.
        
        $category->delete();
    }
}
