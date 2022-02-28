<?php

namespace Cms\Domain\Blocks\Utilities;

use Spatie\DataTransferObject\DataTransferObject;

class BlockConfig extends DataTransferObject
{
    public ?string $headingLevel = '1';
    public ?string $headingSize = 'xxl';
    
    public static function get(array $config): self
    {
        return new self([
            'headingLevel' => $config['headingLevel'] ?? '1',
            'headingSize' => $config['headingSize'] ?? 'xxl',
        ]);
    }
}
