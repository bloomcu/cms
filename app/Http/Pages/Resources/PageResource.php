<?php

namespace Cms\Http\Pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\BlockResource;

class PageResource extends JsonResource
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
            'category' => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}
