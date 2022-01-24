<?php

namespace Cms\Http\Posts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\BlockResource;
use Cms\Http\Layouts\Resources\LayoutResource;

class PostResource extends JsonResource
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
            'path' => $this->path,
            'slug' => $this->slug,
            'url' => $this->url,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'layout' => new LayoutResource($this->whenLoaded('layout'))
        ];
    }
}
