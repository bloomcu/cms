<?php

namespace Cms\Http\Blocks;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;
use Cms\App\DataTransferObjects\ResponseData;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Blocks\Block;

use Cms\Http\Blocks\Resources\BlockCollection;
use Cms\Http\Blocks\Resources\BlockResource;

use Cms\Http\Blocks\Requests\StoreBlockRequest;
use Cms\Http\Blocks\Requests\UpdateBlockRequest;

use Cms\Domain\Blocks\DTO\BlockDTO;
use Cms\Domain\Blocks\DTO\SetBlockDTO;

use Cms\Domain\Blocks\Actions\StoreBlockAction;

class BlockController extends Controller
{
    public function index(Organization $organization, Request $request)
    {
        $blocks = Block::filter($request)
            ->latest()
            ->get();

        return new BlockCollection($blocks);
    }

    public function store(Organization $organization, StoreBlockRequest $request)
    {
        $block = StoreBlockAction::execute(
            $request->toDTO()
        );

        return new BlockResource(
            BlockDTO::fromModel($block)
        );
    }

    public function show(Organization $organization, Block $block)
    {
        dd(BlockDTO::fromModel($block));

        return new BlockResource(
            BlockDTO::fromModel($block)
        );
    }

    public function update(Organization $organization, Block $block, UpdateBlockRequest $request)
    {
        $block->update(
            $request->validated()
        );

        return new BlockResource($block);
    }

    public function destroy(Organization $organization, Block $block)
    {
        $block->delete();
    }
}
