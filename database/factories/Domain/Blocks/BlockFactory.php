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
            'component' => $this->faker->randomElement([
                'Hero',
                'BoxedHero',
                'Feature',
            ]),
            'group' => $this->faker->randomElement([
                'hero',
                'feature',
            ]),
            'property_id' => \Cms\Domain\Properties\Property::factory(),
            'order' => $this->faker->randomDigit,
        ];
    }
}
