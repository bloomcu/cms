<?php

namespace Cms\Http\Blocks\Resources\Content;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Blocks\Resources\Button\ButtonCollection;

class ContentComponentResource extends JsonResource
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
            'label'   => isset($this['label']) ? $this['label'] : '', // string
            'title'   => isset($this['title']) ? $this['title'] : '', // string
            'body'    => isset($this['body']) ? $this['body'] : '', // string
            // 'buttons' => new ButtonCollection(isset($this['buttons']) ? $this['buttons'] : [])
        ];
    }
}
