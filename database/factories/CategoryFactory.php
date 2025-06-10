<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => collect(['تصميم', 'برمجة', 'تسويق', 'إدارة'])->random(2)->implode(' '),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true, 'category'),
            'main_category_id' => \App\Models\MainCategory::factory(),
        ];
    }
}
