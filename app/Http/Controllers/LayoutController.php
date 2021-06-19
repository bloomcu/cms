<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Layout;
use App\Models\Block;
// use App\Http\Requests\LayoutStoreRequest;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Layout::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
     public function store(Request $request)
     {
         $layout = Layout::create(
             // $request->validated()
             $request->all()
         );

         return $layout;
     }

    /**
     * Display the specified resource.
     *
     */
    public function show(Layout $layout)
    {
        return $layout
            ->load('blocks');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Layout $layout, Request $request)
    {
        // $layout->update(
        //     $request->all()
        // );

        // return $request['blocks'];
        // $storedBlock = Block::firstWhere('uuid', 'ce7123d1-e48f-4fa1-aa00-db55bce588da');
        // return $storedBlock;

        foreach($request['blocks'] as $index => $block) {

            $storedBlock = Block::firstWhere('uuid', $block['uuid']);

            $storedBlock->update([
                'content' => $block['content'],
                'order' => $index
            ]);
        }

        return $layout;
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
    public function destroy(Layout $layout)
    {
        return $layout->delete();
    }
}
