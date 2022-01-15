<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Domains
use Cms\Domain\Menus\Menu;

// Actions
use Cms\Domain\Menus\Actions\UpsertMenuItemsAction;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'title' => 'Navbar',
                'component' => 'navbar-1',
                'organization_id' => 1,
            ]
        ];

        $items = [
            [
                'id' => 1,
                'title' => 'Accounts',
                'parent_id' => null,
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 0,
                'children' => [
                    ['id' => 2, 'title' => 'Checking', 'parent_id' => 1, 'component' => null, 'menu_id' => 1, 'order' => 0],
                    ['id' => 3, 'title' => 'Savings', 'parent_id' => 1, 'component' => null, 'menu_id' => 1, 'order' => 1],
                ]
            ],
            [
                'id' => 4,
                'title' => 'Loans',
                'parent_id' => null,
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 2,
                'children' => [
                    ['id' => 5, 'title' => 'Vehicle', 'parent_id' => 4, 'component' => null, 'menu_id' => 1, 'order' => 0],
                    ['id' => 6, 'title' => 'Home', 'parent_id' => 4, 'component' => null, 'menu_id' => 1, 'order' => 1],
                    ['id' => 7, 'title' => 'Personal', 'parent_id' => 4, 'component' => null, 'menu_id' => 1, 'order' => 2],
                ]
            ],
            [
                'id' => 8,
                'title' => 'Cards',
                'parent_id' => null,
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 3,
                'children' => [
                    ['id' => 9, 'title' => 'Credit', 'parent_id' => 8, 'component' => null, 'menu_id' => 1, 'order' => 0],
                    ['id' => 10, 'title' => 'Debit', 'parent_id' => 8, 'component' => null, 'menu_id' => 1, 'order' => 1],
                ]
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }

        UpsertMenuItemsAction::execute($items);
    }
}
