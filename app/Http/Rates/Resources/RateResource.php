<?php

namespace Cms\Http\Rates\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'row_id' => $this->row_id,
            'col_id' => $this->col_id,
            'data' => $this->data
        ];
    }
}
