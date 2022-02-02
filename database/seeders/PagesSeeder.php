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
        $pages = [
            [
                'title' => 'Blank Page Blueprint',
                'is_blueprint' => true,
                'property_id' => 1,
                // 'category_id' => null,
            ],
            [
                'title' => 'Homepage',
                'property_id' => 1,
                // 'category_id' => 2,
            ],
            [
                'title' => 'Regular Checking',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Gold Checking',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Savings Account',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Money Market',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Auto Loan',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Mortgage',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Credit Card',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Business Checking',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Business Savings',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'Contact Us',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
            [
                'title' => 'About Us',
                'property_id' => 1,
                // 'category_id' => 4,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
