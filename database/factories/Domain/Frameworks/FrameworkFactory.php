<?php

namespace Database\Factories\Domain\Frameworks;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Frameworks\Framework;

class FrameworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Framework::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
