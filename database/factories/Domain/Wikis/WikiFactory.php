<?php

namespace Database\Factories\Domain\Wikis;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Wikis\Wiki;

class WikiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wiki::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase,
        ];
    }
}
