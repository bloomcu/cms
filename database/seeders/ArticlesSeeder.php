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
                'property_id' => 1,
                'is_blueprint' => true,
            ],
            [
                'title' => 'My First Article!',
                'property_id' => 1,
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
