<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Pages\Article;

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
                'title' => 'Blank Article',
                'organization_id' => 1,
                'category_id' => null,
            ],
            [
                'title' => 'Hello world!',
                'organization_id' => 1,
                'category_id' => 2,
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
