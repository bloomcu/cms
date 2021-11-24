<?php

namespace Cms\Http\Categories\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Categories\Resources\CategoryResource;

class CategoryCollection extends ResourceCollection
{
    /**
     * Disable default "data" wrapper.
     *
     * @var string
     */
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return CategoryResource::collection($this->collection);
    }
}
