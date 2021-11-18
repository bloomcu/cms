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
            'title' => $this->faker->unique()->randomElement([
                'Homepage',
                'About',
                'Contact'
            ]),
            'organization_id' => \Cms\Domain\Organizations\Organization::factory(),
            'category_id' => \Cms\Domain\Categories\Category::factory(),
        ];
    }
}
