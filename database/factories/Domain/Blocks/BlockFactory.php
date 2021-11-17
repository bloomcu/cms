<?php

namespace Database\Factories\Domain\Blocks;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Blocks\Block;

class BlockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Block::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'type' => $this->faker->word,
            'component' => $this->faker->word,
            'layout_id' => \Cms\Domain\Layouts\Layout::factory(),
            'order' => $this->faker->randomDigit,
            // 'content' =>
        ];
    }
}
