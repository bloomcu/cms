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
        $menu = [
            'title' => 'Primary Navigation',
            'organization_id' => 1,
            'items' => [
                [
                    'id' => 1,
                    'title' => 'Accounts',
                    'menu_id' => 1,
                    'order' => 0,
                    'children' => [
                        ['title' => 'Checking', 'parent_id' => 1, 'menu_id' => 1, 'order' => 0],
                        ['title' => 'Savings', 'parent_id' => 1, 'menu_id' => 1, 'order' => 1],
                    ]
                ],
                [
                    'id' => 4,
                    'title' => 'Loans',
                    'menu_id' => 1,
                    'order' => 2,
                    'children' => [
                        ['title' => 'Vehicle', 'parent_id' => 4, 'menu_id' => 1, 'order' => 0],
                        ['title' => 'Home', 'parent_id' => 4, 'menu_id' => 1, 'order' => 1],
                        ['title' => 'Personal', 'parent_id' => 4, 'menu_id' => 1, 'order' => 2],
                    ]
                ],
                [
                    'id' => 8,
                    'title' => 'Cards',
                    'menu_id' => 1,
                    'order' => 3,
                    'children' => [
                        ['title' => 'Credit', 'parent_id' => 8, 'menu_id' => 1, 'order' => 0],
                        ['title' => 'Debit', 'parent_id' => 8, 'menu_id' => 1, 'order' => 1],
                    ]
                ],
            ]
        ];

        Menu::create([
            'title' => $menu['title'],
            'organization_id' => $menu['organization_id'],
        ]);

        UpsertMenuItemsAction::execute(
            $menu['items']
        );
    }
}
