<?php

namespace Database\Factories\Domain\Layouts;

use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Layouts\Layout;

class LayoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Layout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;

        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'organization_id' => \Cms\Domain\Organizations\Organization::factory(),
            'page_id' => \Cms\Domain\Pages\Page::factory(),
            'category_id' => \Cms\Domain\Categories\Category::factory(),
            'framework_id' => \Cms\Domain\Frameworks\Framework::factory(),
        ];
    }
}
