<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Files\File;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->unique()->uuid,
            'title' => $this->faker->word,
            'name' => $this->faker->word . '.jpg',
            'path' => 'files/abc.jpg',
            'size' => 50000
        ];
    }
}
