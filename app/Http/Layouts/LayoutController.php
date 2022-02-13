<?php

namespace Cms\Http\Layouts;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Layouts\Layout;

// Resources
use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Layouts\Resources\LayoutResource;

// Requests
use Cms\Http\Layouts\Requests\LayoutStoreRequest;

class LayoutController extends Controller
{

    public function index(Organization $organization, Property $property, Request $request)
    {
        $layouts = $property->layouts()
            ->latest()
            ->get();
        
        return new LayoutCollection($layouts);
    }

     public function store(Organization $organization, Property $property, LayoutStoreRequest $request)
     {
         $layout = $property->layouts()->create(
             $request->validated()
         );
         
         if ($request->category) {
             $layout->syncCategories($request->category);
         }

         return new LayoutResource($layout);
     }

    public function show(Organization $organization, Property $property, Layout $layout)
    {
        return new LayoutResource(
            $layout->load(['blocks'])
        );
    }

    public function update(Organization $organization, Property $property, Layout $layout, Request $request)
    {
        $layout->update(
            $request->all()
        );
        
        if ($request->category) {
            $layout->syncCategories($request->category);
        }

        // TODO: Try using Sync for this?
        // if ($request['blocks']) {
        //     foreach($request['blocks'] as $index => $block) {
        //
        //         $storedBlock = Block::firstWhere('uuid', $block['uuid']);
        //
        //         $storedBlock->update([
        //             'data' => $block['data'],
        //             'order' => $index
        //         ]);
        //     }
        // }

        return new LayoutResource(
            $layout->load(['blocks'])
        );
    }

    public function destroy(Organization $organization, Property $property, Layout $layout)
    {
        $layout->delete();
        
        return new LayoutResource($layout);
    }
}
