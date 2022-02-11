<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Vendors
use Spatie\QueryBuilder\QueryBuilder;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Blocks\Block;

// Resources
use Cms\Http\Blocks\Resources\ShowBlockResource;

// Requests
// use Cms\Http\Blocks\Requests\BlockStoreRequest;
// use Cms\Http\Blocks\Requests\BlockUpdateRequest;

class BlockController extends Controller
{
    // TODO: Do we need this endpoint? 
    // When would we index all blocks used across layouts?
    public function index(Organization $organization, Property $property, Request $request)
    {
        $blocks = QueryBuilder::for(Block::class)
            ->where('property_id', $property->id)
            ->allowedFilters([
                'is_blueprint',
                'categories.id',
            ])
            ->with('categories')
            ->latest()
            ->get();
        
        return ShowBlockResource::collection($blocks);
    }

    public function store(Organization $organization, Property $property, Request $request)
    {
        $block = $property->blocks()->create(
            // TODO: Use FormRequest for request validation
            // $request->validated()
            $request->all()
        );
        
        if ($request->category) {
            $block->syncCategories($request->category);
        }

        return new ShowBlockResource($block);
    }

    public function show(Organization $organization, Property $property, Block $block)
    {
        return new ShowBlockResource($block);
    }

    public function update(Organization $organization, Property $property, Block $block, Request $request)
    {
        $block->update(
            // TODO: Use FormRequest for request validation
            // $request->validated()
            $request->all()
        );

        return new ShowBlockResource($block);
    }

    public function destroy(Organization $organization, Property $property, Block $block)
    {
        $block->delete();
        
        return new ShowBlockResource($block);
    }
}
