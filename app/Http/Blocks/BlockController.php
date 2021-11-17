<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\BlockCollection;
use Cms\Http\Blocks\Resources\BlockResource;

// use Cms\Http\Blocks\Requests\BlockStoreRequest;
// use Cms\Http\Blocks\Requests\BlockUpdateRequest;

class BlockController extends Controller
{
    public function __construct(Request $request)
    {
        $locale = $request['locale'];
        $this->middleware("setLocale:$locale");
    }

    public function index(Organization $organization)
    {
        return new BlockCollection(
            Block::all()
        );
    }

    public function store(Organization $organization, Request $request)
    {
        $block = Block::create(
            // $request->validated()
            $request->all()
        );

        return new BlockResource($block);
    }

    public function show(Organization $organization, Block $block)
    {
        return new BlockResource($block);
    }

    public function update(Organization $organization, Block $block, Request $request)
    {
        $block->update(
            // $request->validated()
            $request->all()
        );

        return new BlockResource($block);
    }

    public function destroy(Organization $organization, Block $block)
    {
        $block->delete();
    }
}
