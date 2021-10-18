<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Layouts\Layout;

class LayoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Layout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence
        ];
    }
}
