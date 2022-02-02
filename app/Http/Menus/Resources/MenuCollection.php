<?php

namespace Cms\Http\Menus\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Menus\Resources\MenuResource;

class MenuCollection extends ResourceCollection
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
        return MenuResource::collection($this->collection);
    }
}
