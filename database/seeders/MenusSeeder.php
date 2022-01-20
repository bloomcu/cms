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
                'title' => 'Header',
                'location' => 'header',
                'component' => 'navbar-1',
                'property_id' => 1,
            ]
        ];

        $items = [
            [
                'uuid' => '1dabeb79-d22a-49f2-925f-0b3141a66285',
                'title' => 'Accounts',
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 0,
                'children' => [
                    [
                        'uuid' => '2dabeb79-d22a-49f2-925f-0b3141a66026',
                        'title' => 'Checking',
                        'parent_id' => 1,
                        'menu_id' => 1,
                        'order' => 0
                    ],
                    [
                        'uuid' => '3dabeb79-d22a-49f2-925f-0b3141a66025',
                        'title' => 'Savings',
                        'parent_id' => 1,
                        'menu_id' => 1,
                        'order' => 1
                    ],
                ]
            ],
            [
                'uuid' => '4dabeb79-d22a-49f2-925f-0b3141a66437',
                'title' => 'Loans',
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 2,
                'children' => [
                    [
                        'uuid' => '5dabeb79-d22a-49f2-925f-0b3141a66987',
                        'title' => 'Vehicle',
                        'parent_id' => 4,
                        'menu_id' => 1,
                        'order' => 0
                    ],
                    [
                        'uuid' => '6dabeb79-d22a-49f2-925f-0b3141a66144',
                        'title' => 'Home',
                        'parent_id' => 4,
                        'menu_id' => 1,
                        'order' => 1
                    ],
                    [
                        'uuid' => '7dabeb79-d22a-49f2-925f-0b3141a66037',
                        'title' => 'Personal',
                        'parent_id' => 4,
                        'menu_id' => 1,
                        'order' => 2
                    ],
                ]
            ],
            [
                'uuid' => '8dabeb79-d22a-49f2-925f-0b3141a66998',
                'title' => 'Cards',
                'component' => 'dropdown-1',
                'menu_id' => 1,
                'order' => 3,
                'children' => [
                    [
                        'uuid' => '9dabeb79-d22a-49f2-925f-0b3141a66558',
                        'title' => 'Credit',
                        'parent_id' => 8,
                        'menu_id' => 1,
                        'order' => 0
                    ],
                    [
                        'uuid' => '0dabeb79-d22a-49f2-925f-0b3141a66881',
                        'title' => 'Debit',
                        'parent_id' => 8,
                        'menu_id' => 1,
                        'order' => 1
                    ],
                ]
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }

        UpsertMenuItemsAction::execute($items);
    }
}
