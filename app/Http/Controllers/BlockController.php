<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Block;
use App\Http\Requests\BlockStoreRequest;
use App\Http\Requests\BlockUpdateRequest;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Block::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(BlockStoreRequest $request)
    {
        $block = Block::create(
            $request->validated()
        );

        return $block;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Block $block)
    {
        return $block
            ->load('contents');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Block $block, BlockUpdateRequest $request)
    {
        $block->update(
            $request->validated()
        );

        return $block;
    }

    // public function updateBatch(Company $company, Request $request)
    // {
    //     if ($request->category_id) {
    //         return Page::whereIn('id', $request->page_ids)
    //             ->update([
    //                 'category_id' => $request->category_id
    //             ]);
    //     }
    //
    //     if ($request->type_id) {
    //         return Page::whereIn('id', $request->page_ids)
    //             ->update([
    //                 'type_id' => $request->type_id
    //             ]);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     */
    // public function destroy(Company $company, Page $page)
    // {
    //     return Page::where('id', $page->id)->delete();
    // }
}
