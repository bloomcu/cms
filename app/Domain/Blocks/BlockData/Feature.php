<?php

namespace Cms\Domain\Blocks\BlockData;

class Feature
{

    public static function get(array $value)
    {
        // Let's maybe construct everything in $value so we can set defaults for null values

        return [
            'label'    => $value['label'] ?? null,
            'title'    => $value['title'] ?? null,
            'subtitle' => $value['subtitle'] ?? null,
            // 'image'    => new Image($value['image']) ?? []
        ];
    }

    public static function set(array $value)
    {
        $data = [
            'label'    => $value['label'] ?? null,
            'title'    => $value['title'] ?? null,
            'subtitle' => $value['subtitle'] ?? null,
            // 'image'    => $value['image'] ? new Image($value['image']) : null
        ];

        return json_encode($data, true);
    }
}
