<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BaseBlock;

class BaseBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return BaseBlock::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $block = BaseBlock::create(
            // $request->validated()
            $request->all()
        );

        return $block;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Baseblock $baseBlock)
    {
        return $baseBlock;
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
}
