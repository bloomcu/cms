<?php

namespace Cms\Domain\Blocks\Actions;

use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\DTO\BlockDTO;

class StoreBlockAction
{
    public function execute(BlockDTO $dto): Block
    {
        return Block::create([
            'uuid'      => $dto->uuid,
            'title'     => $dto->title,
            'component' => $dto->component,
            'layout_id' => $dto->layout_id,
            'data'      => $dto->data,
        ]);
    }
}
