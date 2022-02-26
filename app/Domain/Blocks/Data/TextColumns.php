<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Elements\Image;

class TextColumns extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'gap'     => $value['gap'] ?? 'xl',
            'cols'    => $value['cols'] ?? 2,
            'columns' => $value['columns'] ?? [],
        ];
    }
}
