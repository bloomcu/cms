<?php

namespace Cms\Http\Layouts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\BlockCollection;

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
            'category' => new CategoryResource($this->whenLoaded('categories')->first()),
            'blocks' => new BlockCollection($this->whenLoaded('blocks')),
            'draft' => new LayoutResource($this->whenLoaded('draft')),
        ];
    }
}
