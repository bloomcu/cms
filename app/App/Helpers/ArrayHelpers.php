<?php

namespace Cms\App\Helpers;

class ArrayHelpers
{
    /**
     * Flatten multidimensional array
     *
     * Recursively iterate over a multidimensional array
     * merging nested arrays onto a new flat array.
     *
     * @param  array $array Array nested with other arrays.
     * @return array Flat array
     */
    public static function flatten(array $array)
    {
        $result = [];

        foreach ($array as $item) {
            if (is_array($item)) {
                $result[] = array_filter($item, function($array) {
                    return ! is_array($array);
                });
                $result = array_merge($result, ArrayHelpers::flatten($item));
            }
        }

        return array_filter($result);
    }

    /**
     * Build tree from flat array
     *
     * Iterate over a flat array and nest children
     * into parent items by the child's "parent_id".
     *
     * @param  array $array Array nested with other arrays.
     * @return array Flat array
     */
    public static function buildTree(array &$items, $parentId = 0)
    {
        $branch = array();

        foreach ($items as $item) {

            if ($item['parent_id'] == $parentId) {
                $children = ArrayHelpers::buildTree($items, $item['id']);

                if ($children) {
                    $item['children'] = $children;
                }

                $branch[$item['id']] = $item;
                unset($item);
            }

        }

        return $branch;
    }
}
