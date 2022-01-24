<?php

namespace Cms\Http\Globals\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// Resources
use Cms\Http\Menus\Resources\Menu\ShowMenuResource;

class GlobalsResource extends JsonResource
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
            'logo' => 'https://amazon.s3.bloom/bucket/logo.svg',
            'favicon_url' => 'https://amazon.s3.bloom/bucket/favicon.png',
            'gtm_container' => '123456',
            'noindex_all' => false,
            'socials' => [
                'facebook' => 'bloomcu',
                'twitter' => '@bloomcu',
                'youtube' => 'bloomcu',
            ],
            'header' => new ShowMenuResource($this->whenLoaded('globalHeader')),
            'footer' => new ShowMenuResource($this->whenLoaded('globalFooter')),
            'inject_head' => null,
            'inject_footer' => null,
        ];
    }
}
