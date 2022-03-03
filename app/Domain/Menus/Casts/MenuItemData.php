<?php

namespace Cms\Domain\Menus\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

use Cms\Domain\Blocks\Elements\Button;

class MenuItemData implements CastsAttributes
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
        $value = is_array($value) ? $value : json_decode($value, true);

        return Button::get($value);
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
        $value = !is_array($value) ? $value : json_encode($value);

        return $value;
    }
}
