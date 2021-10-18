<?php

namespace Database\Factories;

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
            'organization_id' => \Cms\Domain\Organizations\Organization::factory(),
            'layout_id' => \Cms\Domain\Layouts\Layout::factory(),
            'title' => $this->faker->catchPhrase
        ];
    }
}
