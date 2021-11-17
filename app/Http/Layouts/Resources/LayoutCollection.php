<?php

namespace Cms\Http\Layouts\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Layouts\Resources\LayoutResource;

class LayoutCollection extends ResourceCollection
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
            'data' => LayoutResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count()
            ]
        ];
    }
}
