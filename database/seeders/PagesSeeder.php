<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Posts\Post;

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
        
        $posts = [
            [
                'title' => 'Blank Page Blueprint',
                'type' => 'page',
                'is_blueprint' => true,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => null,
            ],
            [
                'title' => 'Homepage',
                'type' => 'page',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 2,
            ],
            [
                'title' => 'Checking',
                'type' => 'page',
                'is_blueprint' => false,
                'property_id' => 1,
                'created_at' => $now->addSecond()->toDateTimeString(),
                'category_id' => 4,
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
