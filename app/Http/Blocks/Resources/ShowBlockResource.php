<?php

namespace Cms\Http\Blocks\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

// Resources
use Cms\Http\Blocks\Resources\Blocks\FeatureResource;
use Cms\Http\Blocks\Resources\Blocks\HeroResource;

class ShowBlockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dataResource = 'Cms\\Http\\Blocks\\Resources\\Data\\' . Str::studly($this->component) . 'Resource';

        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'title' => $this->title,
            'component' => $this->component,
            'order' => $this->order,
            'data' => new $dataResource($this->data),
        ];
    }
}
