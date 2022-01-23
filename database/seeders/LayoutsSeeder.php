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
        $now = now();

        $layouts = [
            [
                'title' => 'Blank Layout',
                'property_id' => 1,
                'page_id' => 1,
                'category_id' => null,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            [
                'title' => 'Homepage Layout',
                'property_id' => 1,
                'page_id' => 2,
                'category_id' => 2,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            [
                'title' => 'Checking Layout',
                'property_id' => 1,
                'page_id' => 3,
                'category_id' => 4,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ]
        ];

        foreach ($layouts as $layout) {
            Layout::create($layout);
        }
    }
}
