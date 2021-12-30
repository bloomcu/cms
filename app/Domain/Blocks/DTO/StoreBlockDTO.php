<?php

namespace Cms\Domain\Blocks\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class StoreBlockDTO extends DataTransferObject
{
    public string $title;
    public string $component;
    public int    $layout_id;
    public array  $data;
}
