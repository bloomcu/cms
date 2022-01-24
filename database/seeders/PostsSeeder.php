<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Posts\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Blank Post',
                // 'is_published' => false,
                'is_blueprint' => true,
                'property_id' => 1,
                'category_id' => null,
            ],
            [
                'title' => 'Homepage',
                // 'is_published' => true,
                'is_blueprint' => false,
                'property_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'Checking',
                // 'is_published' => true,
                'is_blueprint' => false,
                'property_id' => 1,
                'category_id' => 4,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
