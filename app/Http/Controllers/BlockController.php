<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Block;
// use App\Http\Requests\BlockStoreRequest;
// use App\Http\Requests\BlockUpdateRequest;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Block::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $block = Block::create(
            // $request->validated()
            $request->all()
        );

        return $block;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Block $block)
    {
        return $block;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Block $block, Request $request)
    {
        $block->update(
            // $request->validated()
            $request->all()
        );

        return $block;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Block $block)
    {
        $block->delete();

        return $block;
    }
}
