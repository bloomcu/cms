<?php

namespace Cms\Http\Pages\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Pages\Resources\PageResource;

class PageCollection extends ResourceCollection
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
            'data' => PageResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count()
            ]
        ];
    }
}
