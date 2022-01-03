<?php

namespace Cms\App\Helpers;

/**
*  Check if $var is set and if not return null or default
*  @param mixed $var The var to check if it is set.
*  @param mixed $default The value to return if var is not set.
*/
if (! function_exists('setOrNull')) {
    function setOrNull($var, $default = null)
    {
        return isset($var) ? $var : $default;
    }
}
