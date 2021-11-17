<?php

namespace Database\Factories\Domain\Files;

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
            'organization_id' => \Cms\Domain\Organizations\Organization::factory(),
            'user_id' => \Cms\Domain\Users\User::factory(),
            'name' => $this->faker->word . '.jpg',
            'path' => 'files/6689921281927008bd747a13a29bd2da.jpg',
            'size' => 50000
        ];
    }
}
