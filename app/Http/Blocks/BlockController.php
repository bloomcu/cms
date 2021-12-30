<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\BlockCollection;
use Cms\Http\Blocks\Resources\BlockResource;

use Cms\Http\Blocks\Requests\StoreBlockRequest;
use Cms\Http\Blocks\Requests\UpdateBlockRequest;

use Cms\Domain\Blocks\Actions\StoreBlockAction;

class BlockController extends Controller
{
    public function index(Organization $organization, Request $request)
    {
        // $blocks = $organization->blocks()
        //     ->filter($request)
        //     ->latest()
        //     ->get();
        //
        // return new BlockCollection($blocks);

        $blocks = Block::filter($request)
            ->latest()
            ->get();

        return new BlockCollection($blocks);
    }

    public function store(Organization $organization, StoreBlockRequest $request, StoreBlockAction $action)
    {
        return new BlockResource(
            $action->execute($request->toDTO())
        );
    }

    public function show(Organization $organization, Block $block)
    {
        return new BlockResource($block);
    }

    public function update(Organization $organization, Block $block, UpdateBlockRequest $request)
    {
        $block->update(
            $request->validated()
            // $request->all()
        );

        return new BlockResource($block);
    }

    public function destroy(Organization $organization, Block $block)
    {
        $block->delete();
    }
}
