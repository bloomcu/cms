<?php

namespace Database\Factories\Domain\Layouts;

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
        static $order = 1;

        return [
            'title' => $this->faker->sentence,
            'property_id' => \Cms\Domain\Properties\Property::factory(),
            'post_id' => \Cms\Domain\Posts\Post::factory(),
        ];
    }
}
