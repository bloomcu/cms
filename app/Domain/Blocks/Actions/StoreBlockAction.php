<?php

namespace Cms\Domain\Blocks\Actions;

use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\DTO\StoreBlockDTO;

class StoreBlockAction
{
    public function execute(StoreBlockDTO $dto): Block
    {
        return Block::create([
            'title'     => $dto->title,
            'component' => $dto->component,
            'layout_id' => $dto->layout_id,
            'data'      => $dto->data,
        ]);
    }
}
