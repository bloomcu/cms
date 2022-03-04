<?php

namespace Cms\Http\Posts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\ShowBlockResource;

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
            'type' => $this->type,
            'title' => $this->title,
            'path' => $this->path,
            'slug' => $this->slug,
            'url' => $this->url,
            'is_blueprint' => $this->is_blueprint,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'blocks' => ShowBlockResource::collection($this->whenLoaded('blocks')),
            'meta' => [
                'title' => $this->meta['title'] ?? '',
                'description' => $this->meta['description'] ?? '',
                'image' => $this->meta['image'] ?? ''
            ],
            'drafted_at' => $this->drafted_at,
            'has_changes' => $this->hasUnpublishedChanges(),
            'was_published' => $this->wasPublished(),
        ];
    }
}
