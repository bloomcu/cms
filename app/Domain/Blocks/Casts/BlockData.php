<?php

namespace Cms\Domain\Blocks\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BlockData implements CastsAttributes
{

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        // dd(json_decode($value, true));
        // dd(json_decode($value));
        $value = is_array($value) ? $value : json_decode($value, true);
        // dd($value);
        return ($model->dataClass())::get(
            $value
            // json_decode($value)
            // json_decode($value, true)
            // serialize($value)
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return array
     */
    public function set($model, $key, $value, $attributes)
    {
        // dd($value);
        $value = !is_array($value) ? $value : json_encode($value);
        
        // $value = is_array($value) ? $value : json_decode($value, true);
        
        // return ($model->dataClass())::set(
        //     $value
        // );
        // dd($value);
        return $value;
        // dd($value);
        // return json_encode($value);
    }
}
