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
            MenuItem::upsert($item, ['id'], [
                'title',
                'menu_id',
                'parent_id',
                'order',
            ]);
        }
    }
}
