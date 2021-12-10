<?php

namespace Cms\Http\Blocks\Resources\Button;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Blocks\Resources\Button\ButtonResource;

class ButtonCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ButtonResource::collection($this->collection);
        // return ButtonResource::collection(
        //     isset($this->collection ? $this->collection : new ButtonResource([])
        // );
    }
}
