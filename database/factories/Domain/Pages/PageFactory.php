<?php

namespace Database\Factories\Domain\Pages;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Pages\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique(true)->randomElement([
                'Homepage',
                'About',
                'Contact'
            ]),
            'property_id' => \Cms\Domain\Properties\Property::factory(),
        ];
    }
}
