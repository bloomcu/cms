<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Domains
use Cms\Domain\Categories\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCategories = [
            [
                'title' => 'Pages', 
                'property_id' => 1, 
                'location' => 'pages', 
                'children' => [
                    ['title' => 'Homepage'],
                    ['title' => 'Accounts', 'children' => [
                        ['title' => 'Checking'],
                        ['title' => 'Savings', 'children' => [
                            ['title' => 'Share'],
                            ['title' => 'Money Market'],
                            ['title' => 'Certificates'],
                            ['title' => 'Retirement'],
                            ['title' => 'Education'],
                            ['title' => 'Trust'],
                            ['title' => 'Estate'],
                            ['title' => 'Health'],
                        ]],
                    ]],
                    ['title' => 'Loans', 'children' => [
                        ['title' => 'Vehicle'],
                        ['title' => 'Home', 'children' => [
                            ['title' => 'Mortgage'],
                            ['title' => 'Home Equity'],
                        ]],
                        ['title' => 'Personal'],
                        ['title' => 'Student'],
                    ]],
                    ['title' => 'Cards', 'children' => [
                        ['title' => 'Credit'],
                        ['title' => 'Debit'],
                        ['title' => 'Prepaid'],
                    ]],
                    ['title' => 'Services', 'children' => [
                        ['title' => 'Investment'],
                        ['title' => 'Insurance'],
                        ['title' => 'Notary'],
                        ['title' => 'Planning'],
                    ]],
                    ['title' => 'Resources', 'children' => [
                        ['title' => 'Education'],
                        ['title' => 'Calculators'],
                        ['title' => 'Classifieds'],
                        ['title' => 'Planning'],
                    ]],
                    ['title' => 'Online & Mobile', 'children' => [
                        ['title' => 'Online'],
                        ['title' => 'Mobile'],
                    ]],
                    ['title' => 'Business', 'children' => [
                        ['title' => 'Accounts', 'children' => [
                            ['title' => 'Checking'],
                            ['title' => 'Savings'],
                        ]],
                        ['title' => 'Loans', 'children' => [
                            ['title' => 'SBA'],
                            ['title' => 'Line of Credit'],
                            ['title' => 'Vehicle'],
                            ['title' => 'Real Estate'],
                        ]],
                        ['title' => 'Cards', 'children' => [
                            ['title' => 'Credit'],
                            ['title' => 'Debit'],
                        ]],
                        ['title' => 'Services', 'children' => [
                            ['title' => 'Investment'],
                            ['title' => 'Insurance'],
                        ]],
                        ['title' => 'Resources', 'children' => [
                            ['title' => 'Education'],
                            ['title' => 'Calculators'],
                        ]],
                        ['title' => 'Online & Mobile', 'children' => [
                            ['title' => 'Online'],
                            ['title' => 'Mobile'],
                        ]],
                    ]],
                    ['title' => 'About', 'children' => [
                        ['title' => 'Who We Are'],
                        ['title' => 'Contact', 'children' => [
                            ['title' => 'Location'],
                            ['title' => 'ATM'],
                        ]],
                        ['title' => 'Community'],
                        ['title' => 'Membership'],
                        ['title' => 'Blog'],
                        ['title' => 'News'],
                        ['title' => 'Careers'],
                    ]],
                    ['title' => 'Help', 'children' => [
                        ['title' => 'FAQs'],
                    ]],
                    ['title' => 'Legal'],
                ]
            ]
        ];

        foreach ($pageCategories as $category) {
            Category::create($category);
        }
        
        $articleCategories = [
            [
                'title' => 'Articles', 
                'location' => 'articles',
                'property_id' => 1, 
                'children' => [
                    ['title' => 'Loans'],
                    ['title' => 'Finances'],
                    ['title' => 'Discounts'],
                    ['title' => 'Community'],
                    ['title' => 'Newsroom'],
                    ['title' => 'Fraud Prevention'],
                ]
            ]
        ];

        foreach ($articleCategories as $category) {
            Category::create($category);
        }
        
        $blockCategories = [
            [
                'title' => 'Blocks', 
                'location' => 'blocks',
                'property_id' => 1, 
                'children' => [
                    ['title' => 'Heros'],
                    ['title' => 'Features'],
                    ['title' => 'Text'],
                    ['title' => 'Cards'],
                    ['title' => 'Details'],
                    ['title' => 'Steps'],
                    ['title' => 'Tables'],
                    ['title' => 'Testimonials'],
                    ['title' => 'Accordions'],
                    ['title' => 'Galleries'],
                ]
            ]
        ];

        foreach ($blockCategories as $category) {
            Category::create($category);
        }
    }
}
