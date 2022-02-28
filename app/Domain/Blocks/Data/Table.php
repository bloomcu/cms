<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Utilities\BlockConfig;

class Table extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'columns' => $value['columns'] ?? [
                'Product', 'Term', 'APR'
            ],
            'rows' => $value['rows'] ?? [
                ['New Car', '60 Months', '2.74%'],
                ['Used Car (1-3 years old)', '60 Months', '2.74%'],
                ['Used Car (4-5 years old)', '48 Months', '2.74%'],
                ['Used Car (6-7 years old)', '36 Months', '2.74%'],
                ['Used Car (8+ years old)', '36 Months', '3.74%'],
            ],
            'config' => isset($value['config']) ? BlockConfig::get($value['config']) : new BlockConfig(),
        ];
    }
}
