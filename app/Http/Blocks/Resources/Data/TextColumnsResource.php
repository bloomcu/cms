<?php

namespace Cms\Http\Blocks\Resources\Data;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Blocks\Resources\Content\ContentComponentCollection;

class TextColumnsResource extends JsonResource
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
            'gap'     => isset($this['gap']) ? $this['gap'] : 'xl', // string ('xxs' | 'xs' | 'sm' | 'md' | 'lg' | 'xl' | '0')
            'cols'    => isset($this['cols']) ? $this['cols'] : 2, // number (1 | 2 | 3 | 4 | 6 | 12)
            'columns' => new ContentComponentCollection(isset($this['columns']) ? $this['columns'] : [
                [
                    'label' => 'Label',
                    'title' => 'Column One',
                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sem lorem, eleifend eget eros id, vulputate.',
                ],
                [
                    'label' => 'Label',
                    'title' => 'Column Two',
                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sem lorem, eleifend eget eros id, vulputate.',
                ]
            ])
        ];
    }
}
