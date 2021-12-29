<?php

namespace Cms\Domain\Blocks\BlockData;

use Cms\Domain\Blocks\BlockElements\Image;

class Hero
{
    // public string $label;
    // public string $title;
    // public string $subtitle;
    // public object $image;

    // public function __construct($value) {
    //     $this->label = $value['label'];
    //     $this->title = $value['title'];
    //     $this->subtitle = $value['subtitle'];
    // }

    public static function get(array $value)
    {
        return [
            'label'    => $value['label'] ?? null,
            'title'    => $value['title'] ?? null,
            'subtitle' => $value['subtitle'] ?? null,
            // 'image'    => isset($value['image']) ? Image::get($value['image']) : null
        ];
    }

    public static function set(array $value)
    {
        $data = [
            'label'    => $value['label'] ?? null,
            'title'    => $value['title'] ?? null,
            'subtitle' => $value['subtitle'] ?? null,
            // 'image'    => $value['image']['id'] ?? null
            // 'image'    => isset($value['image']) ? Image::set($value['image']) : null
        ];

        return json_encode($data, true);
    }
}
