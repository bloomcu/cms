<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Categories\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->organization
        ];
    }
}
