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
        $data = $this->data;

        return [
            'center'     => isset($data['center'])     ? $data['center'] : false,
            'fullscreen' => isset($data['fullscreen']) ? $data['fullscreen'] : false,
            'label'      => isset($data['label'])      ? $data['label'] : null,
            'title'      => isset($data['title'])      ? $data['title'] : null,
            'subtitle'   => isset($data['subtitle'])   ? $data['subtitle'] : null,
            'image'      => new ImageResource(isset($this->image) ? $this->image : []),
        ];
    }
}
