<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Pages\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        
        $pages = [
            [
                'title' => 'Blank Page Blueprint',
                'is_blueprint' => true,
                'property_id' => 1,
                // 'category_id' => null,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            [
                'title' => 'Homepage',
                'property_id' => 1,
                // 'category_id' => 2,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            [
                'title' => 'Regular Checking',
                'property_id' => 1,
                // 'category_id' => 4,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            // [
            //     'title' => 'Gold Checking',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Savings Account',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Money Market',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Auto Loan',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Mortgage',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Credit Card',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Business Checking',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Business Savings',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'Contact Us',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'About Us',
            //     'property_id' => 1,
            //     // 'category_id' => 4,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
