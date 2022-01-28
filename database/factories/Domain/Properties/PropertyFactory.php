<?php

namespace Database\Factories\Domain\Properties;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Properties\Property;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique(true)->randomElement([
                'Primary Website',
                'Community Website'
            ]),
            'organization_id' => \Cms\Domain\Organizations\Organization::factory(),
        ];
    }
}
