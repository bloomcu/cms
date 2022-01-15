<?php

namespace Cms\Domain\Menus\Actions;

// Domains
use Cms\Domain\Menus\MenuItem;

// Helpers
use Cms\App\Helpers\ArrayHelpers;

class UpsertMenuItemsAction
{
    public static function execute(array $items): void
    {
        $itemsFlat = ArrayHelpers::flatten($items);

        foreach ($itemsFlat as $item) {
            $new = MenuItem::updateOrCreate(
                ['uuid' => $item['uuid']],
                $item
            );
        }
    }
}
