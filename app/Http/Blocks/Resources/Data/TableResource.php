<?php

namespace Cms\Http\Blocks\Resources\Data;

use Illuminate\Http\Resources\Json\JsonResource;

class TableResource extends JsonResource
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
            'columns' => ['Product', 'Term', 'APR'],
            'rows' => [
                ['New Car', '60 Months', '2.74%'],
                ['Used Car (1-3 years old)', '60 Months', '2.74%'],
                ['Used Car (4-5 years old)', '48 Months', '2.74%'],
                ['Used Car (6-7 years old)', '36 Months', '2.74%'],
                ['Used Car (8+ years old)', '36 Months', '3.74%'],
            ],
        ];
    }
}
