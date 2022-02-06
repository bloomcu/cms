<?php

namespace Cms\Http\Blocks\Resources\Content;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Blocks\Resources\Content\ContentComponentResource;

class ContentComponentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ContentComponentResource::collection($this->collection);
    }
}
