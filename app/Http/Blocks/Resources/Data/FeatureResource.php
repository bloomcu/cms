<?php

namespace Cms\Http\Blocks\Resources\Data;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Blocks\Resources\Image\ImageResource;
use Cms\Http\Blocks\Resources\Button\ButtonCollection;

class FeatureResource extends JsonResource
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
            'invert'     => isset($this['invert']) ? $this['invert'] : false,
            'label'      => isset($this['label']) ? $this['label'] : 'The label',
            'title'      => isset($this['title']) ? $this['title'] : 'The feature title',
            'subtitle'   => isset($this['subtitle']) ? $this['subtitle'] : 'The feature subtitle',
            'image'      => new ImageResource(isset($this['image']) ? $this['image'] : []),
            'buttons'    => new ButtonCollection(isset($this['buttons']) ? $this['buttons'] : [
                ['text' => 'Primary Button'],
                ['text' => 'Secondary Button', 'variant' => 'accent']
            ])
        ];
    }
}
