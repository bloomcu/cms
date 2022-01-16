<?php

namespace Cms\Http\Rates\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateTableResource extends JsonResource
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
            'name'=>$this->name,
            'rates'=> new RatesCollection(
                $this->rates->sortBy(
                    [
                        'row_id'=>'asc',
                        'col_id'=>'asc'
                    ],
                )->groupBy('row_id')
            )
        ];
    }
}
