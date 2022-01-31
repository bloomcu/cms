<?php

namespace Cms\Http\Layouts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\ShowBlockResource;

class LayoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'blocks' => ShowBlockResource::collection($this->whenLoaded('blocks')),
            'draft' => new LayoutResource($this->whenLoaded('draft')),
        ];
    }
}
