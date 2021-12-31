<?php

namespace Cms\Http\Blocks\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

// use Cms\Http\Blocks\Resources\Blocks\FeatureResource;
// use Cms\Http\Blocks\Resources\Blocks\HeroResource;

class BlockResource extends JsonResource
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
            'uuid' => $this->uuid,
            'title' => $this->title,
            'component' => $this->component,
            'order' => $this->order,
            // 'data' => ($this->dataClass())::get($this->data)
            'data' => $this->data
        ];
    }
}
