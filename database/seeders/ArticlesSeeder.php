<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Posts\Post;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        
        $posts = [
            [
                'title' => 'Blank Article Blueprint',
                'type' => 'article',
                'is_blueprint' => true,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => null,
            ],
            [
                'title' => 'Our Top 10 Budgeting Tips',
                'type' => 'article',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 74,
            ],
            [
                'title' => 'Home Equity Loans vs. HELOC',
                'type' => 'article',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 73,
            ],
            [
                'title' => '2021 Advance Child Tax Credit',
                'type' => 'article',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 77,
            ],
            [
                'title' => 'Guide to Jumbo Loans',
                'type' => 'article',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 73,
            ],
            [
                'title' => 'To Refinance or Not to Refinance?',
                'type' => 'article',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 73,
            ],
        ];

        foreach ($posts as $seed) {
            $post = Post::create([
                'title'        => $seed['title'],
                'type'         => $seed['type'],
                'is_blueprint' => $seed['is_blueprint'],
                'property_id'  => $seed['property_id'],
                'created_at'   => $seed['created_at'],
            ]);
            
            $post->categories()->attach($seed['category_id']);
        }
    }
}
