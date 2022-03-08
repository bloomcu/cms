<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Utilities\BlockConfig;

class Table extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'align'    => $value['align'] ?? 'left',
            'label'    => $value['label'] ?? '',
            'title'    => $value['title'] ?? '',
            'subtitle' => $value['subtitle'] ?? '',
            'columns'  => $value['columns'] ?? [
                ['content' => 'Product', 'key' => '1tos8dgz2'],
                ['content' => 'Term', 'key' => 'n2yg9gdlf'],
                ['content' => 'APR', 'key' => 'jsgj1cm5k'],
            ],
            'rows' => $value['rows'] ?? [
                [
                    ['content' => 'New Car', 'key' => 'eswnuo6qu'],
                    ['content' => '60 Months', 'key' => 'j2fbfqda9'],
                    ['content' => '2.74%', 'key' => 'qz7w3ozxh'],
                ],
                [
                    ['content' => 'Used Car (1-3 years old)', 'key' => 'vaa62d7a2'],
                    ['content' => '60 Months', 'key' => 'qfoi0mno6'],
                    ['content' => '3.74%', 'key' => '0za30fat7'],
                ],
                [
                    ['content' => 'Used Car (4-5 years old)', 'key' => 'z6t4l9xwa'],
                    ['content' => '48 Months', 'key' => 'krzqp6o3o'],
                    ['content' => '4.74%', 'key' => '7y1e0fjuo'],
                ],
                [
                    ['content' => 'Used Car (6-7 years old)', 'key' => 'qx3yocuol'],
                    ['content' => '36 Months', 'key' => 'uj1edc6b7'],
                    ['content' => '5.74%', 'key' => '5b15hmvsh'],
                ],
            ],
            'config' => isset($value['config']) ? BlockConfig::get($value['config']) : new BlockConfig([
                'paddingTop' => 'xxl',
                'paddingBottom' => 'xxl',
                'marginTop' => 'none',
                'marginBottom' => 'none',
            ]),
        ];
    }
}
