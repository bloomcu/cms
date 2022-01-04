<?php

namespace Cms\Domain\Blocks\DTO;

use Illuminate\Support\Arr;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\DTO\ImageDTO;

class HeroDataDTO extends DataTransferObject
{
    public static function fromJson(
        string $label,
        string $title,
        string $subtitle,
        array $image,
    ) {
        return [
            'label'    => $label,
            'title'    => $title,
            'subtitle' => $subtitle,
            'image'    => $image,
        ];
    }
}
