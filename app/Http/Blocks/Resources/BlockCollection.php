<?php

namespace Cms\Http\Blocks\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Blocks\Resources\BlockResource;

class BlockCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => BlockResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count()
            ]
        ];
    }
}
