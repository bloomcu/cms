<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\BlockCollection;
use Cms\Http\Blocks\Resources\BlockResource;

// use Cms\Http\Blocks\Requests\BlockStoreRequest;
// use Cms\Http\Blocks\Requests\BlockUpdateRequest;

class BlockController extends Controller
{
    public function index(Organization $organization, Property $property, Request $request)
    {
        $blocks = $property->blocks()
            ->filter($request)
            ->latest()
            ->get();
        
        // TODO: Currently this returns blocks with each block's content
        // Let's create a resource specifically for indexing blocks.
        // See the Menus resources for example.
        return new BlockCollection($blocks);
    }

    public function store(Organization $organization, Property $property, Request $request)
    {
        $block = $property->blocks()->create(
            // TODO: Use FormRequest for request validation
            // $request->validated()
            $request->all()
        );

        return new BlockResource($block);
    }

    public function show(Organization $organization, Property $property, Block $block)
    {
        return new BlockResource($block);
    }

    public function update(Organization $organization, Property $property, Block $block, Request $request)
    {
        $block->update(
            // TODO: Use FormRequest for request validation
            // $request->validated()
            $request->all()
        );

        return new BlockResource($block);
    }

    public function destroy(Organization $organization, Property $property, Block $block)
    {
        $block->delete();
    }
}
