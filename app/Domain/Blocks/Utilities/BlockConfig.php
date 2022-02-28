<?php

namespace Cms\Domain\Blocks\Utilities;

use Spatie\DataTransferObject\DataTransferObject;

class BlockConfig extends DataTransferObject
{
    public ?string $headingLevel = '1';
    public ?string $headingSize = 'xxl';
    public ?string $paddingTop = 'xxl';
    public ?string $paddingBottom = 'xxl';
    public ?string $marginTop = 'none';
    public ?string $marginBottom = 'none';
    
    public static function get(array $config): self
    {
        return new self([
            'headingLevel' => $config['headingLevel'] ?? '1',
            'headingSize' => $config['headingSize'] ?? 'xxl',
            'paddingTop' => $config['paddingTop'] ?? 'xxl',
            'paddingBottom' => $config['paddingBottom'] ?? 'xxl',
            'marginTop' => $config['marginTop'] ?? 'none',
            'marginBottom' => $config['marginBottom'] ?? 'none',
        ]);
    }
}
