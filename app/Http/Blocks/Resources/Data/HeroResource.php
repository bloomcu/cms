<?php

namespace Cms\Http\Blocks\Resources\Data;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Blocks\Resources\Image\ImageResource;
use Cms\Http\Blocks\Resources\Button\ButtonCollection;

class HeroResource extends JsonResource
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
            'center'     => isset($this['center']) ? $this['center'] : false,
            'fullscreen' => isset($this['fullscreen']) ? $this['fullscreen'] : false,
            'label'      => isset($this['label']) ? $this['label'] : 'The label',
            'title'      => isset($this['title']) ? $this['title'] : 'The title',
            'subtitle'   => isset($this['subtitle']) ? $this['subtitle'] : 'The subtitle',
            'image'      => new ImageResource(isset($this['image']) ? $this['image'] : []),
            'buttons'    => new ButtonCollection(isset($this['buttons']) ? $this['buttons'] : [
                ['text' => 'Button One', 'href' => ''],
                ['text' => 'Button Two', 'href' => '']
            ])
        ];
    }
}
