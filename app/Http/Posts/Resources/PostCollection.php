<?php

namespace Cms\Http\Posts\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Posts\Resources\PostResource;

class PostCollection extends ResourceCollection
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
            'data' => PostResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count()
            ]
        ];
    }
}
