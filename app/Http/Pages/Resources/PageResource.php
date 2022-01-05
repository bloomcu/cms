<?php

namespace Cms\Http\Pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\BlockResource;
use Cms\Http\Layouts\Resources\LayoutResource;

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
            'slug' => $this->slug,
            'path' => $this->path,
            'uri' => $this->uri,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'layout' => new LayoutResource($this->whenLoaded('layout'))
        ];
    }
}
