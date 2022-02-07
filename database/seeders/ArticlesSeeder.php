<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Articles\Article;

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
        
        $articles = [
            [
                'title' => 'Blank Article Blueprint',
                'property_id' => 1,
                'is_blueprint' => true,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            [
                'title' => 'My First Article',
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
            ],
            // [
            //     'title' => 'My Second Article',
            //     'property_id' => 1,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'My Third Article',
            //     'property_id' => 1,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'My Fourth Article',
            //     'property_id' => 1,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
            // [
            //     'title' => 'My Fifth Article',
            //     'property_id' => 1,
            //     'created_at' => $now->addSecond()->toDateTimeString(),
            // ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
