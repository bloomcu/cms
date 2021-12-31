<?php

namespace Cms\Domain\Blocks\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ImageDTO extends DataTransferObject
{
    public ?string $id;

    // public static function fromRequest(array $request): self
    // {
    //     return new self([
    //         'id' => intval($request['id']) ?? null,
    //     ]);
    // }
}
