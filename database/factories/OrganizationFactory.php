<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Organizations\Organization;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'uuid' => (string) Str::uuid(),
            'database' => 'cms_' . $slug
        ];
    }
}
