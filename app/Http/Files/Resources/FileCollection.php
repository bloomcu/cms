<?php

namespace Cms\Http\Files\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Files\Resources\FileResource;

class FileCollection extends ResourceCollection
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
            'data' => FileResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count()
            ]
        ];
    }
}
