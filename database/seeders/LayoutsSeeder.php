<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Layouts\Layout;

class LayoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layouts = [
            [
                'title' => 'Homepage Layout',
                'type' => 'layout',
                'organization_id' => 1,
                'page_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'Checking Layout',
                'type' => 'layout',
                'organization_id' => 1,
                'page_id' => 2,
                'category_id' => 4,
            ],
            [
                'title' => 'About Layout',
                'type' => 'layout',
                'organization_id' => 1,
                'page_id' => 3,
                'category_id' => 60,
            ]
        ];

        foreach ($layouts as $layout) {
            Layout::create($layout);
        }
    }
}
