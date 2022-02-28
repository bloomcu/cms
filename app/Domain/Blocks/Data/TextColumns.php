<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Utilities\BlockConfig;
use Cms\Domain\Blocks\Components\ContentComponent;

class TextColumns extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'gap'     => $value['gap'] ?? 'xl',
            'cols'    => $value['cols'] ?? 2,
            'columns' => $value['columns'] ?? [],
            'config'  => isset($value['config']) ? BlockConfig::get($value['config']) : BlockConfig::get([
                'headingLevel' => '2',
                'headingSize' => 'xl',
            ]),
        ];
    }
}
