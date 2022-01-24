<?php

namespace Database\Factories\Domain\Posts;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Posts\Post;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique(true)->randomElement([
                'Homepage',
                'About',
                'Contact'
            ]),
            'property_id' => \Cms\Domain\Properties\Property::factory(),
            'category_id' => \Cms\Domain\Categories\Category::factory(),
        ];
    }
}
