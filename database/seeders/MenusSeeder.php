<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Domains
use Cms\Domain\Menus\Menu;

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
                'title' => 'Main Navigation',
                'location' => 'header',
                'component' => 'navbar',
                'property_id' => 1,
                'children' => [
                    // [
                    //     'title' => 'Accounts',
                    //     'component' => 'dropdown-1',
                    //     'children' => [
                    //         ['title' => 'Checking', 'component' => 'menu-link'],
                    //         ['title' => 'Savings', 'component' => 'menu-link'],
                    //     ]
                    // ],
                    // [
                    //     'title' => 'Loans',
                    //     'component' => 'dropdown-1',
                    //     'children' => [
                    //         ['title' => 'Vehicle', 'component' => 'menu-link'],
                    //         ['title' => 'Home', 'component' => 'menu-link'],
                    //         ['title' => 'Personal', 'component' => 'menu-link'],
                    //     ]
                    // ],
                    // [
                    //     'title' => 'Cards',
                    //     'component' => 'dropdown-1',
                    //     'children' => [
                    //         ['title' => 'Credit', 'component' => 'menu-link'],
                    //         ['title' => 'Debit', 'component' => 'menu-link'],
                    //     ]
                    // ]
                ]
            ],
            [
                'title' => 'Footer',
                'location' => 'footer',
                'component' => 'footer-1',
                'property_id' => 1,
                'children' => [
                    [
                        'title' => 'Accounts',
                        'component' => 'dropdown-1',
                        'children' => [
                            ['title' => 'Checking', 'component' => 'menu-link'],
                            ['title' => 'Savings', 'component' => 'menu-link'],
                        ]
                    ],
                    [
                        'title' => 'Loans',
                        'component' => 'dropdown-1',
                        'children' => [
                            ['title' => 'Vehicle', 'component' => 'menu-link'],
                            ['title' => 'Home', 'component' => 'menu-link'],
                            ['title' => 'Personal', 'component' => 'menu-link'],
                        ]
                    ],
                    [
                        'title' => 'Cards',
                        'component' => 'dropdown-1',
                        'children' => [
                            ['title' => 'Credit', 'component' => 'menu-link'],
                            ['title' => 'Debit', 'component' => 'menu-link'],
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Blog Menu',
                'location' => 'blog',
                'component' => 'subnav-1',
                'property_id' => 1,
                'children' => [
                    [
                        'title' => 'Spending',
                        'component' => 'menu-link',
                    ],
                    [
                        'title' => 'Saving',
                        'component' => 'menu-link',
                    ],
                    [
                        'title' => 'Borrowing',
                        'component' => 'menu-link',
                    ]
                ]
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
