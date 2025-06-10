<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'auther_name' => $this->faker->name,
            'number_lesson' => (string) rand(5, 50),
            'photo' => $this->faker->imageUrl(400, 300, 'education', true, 'course'),
            'duration_hours' => rand(1, 10),
            'duration_minutes' => rand(0, 59),
            'duration_seconds' => rand(0, 59),
            'laungue' => $this->faker->randomElement(['انجليزي', 'عربي']),
            'url' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
