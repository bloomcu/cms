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
        $articles = [
            [
                'title' => 'Blank Article Blueprint',
                // 'is_published' => false,
                'property_id' => 1,
                'category_id' => null,
                'is_blueprint' => true,
            ],
            [
                'title' => 'My first article!',
                // 'is_published' => false,
                'property_id' => 1,
                'category_id' => 2,
                'is_blueprint' => false,
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
