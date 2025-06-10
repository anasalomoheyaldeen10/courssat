<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name' => $this->faker->sentence(3),
            'number' => rand(1, 20),
            'duration_hours' => rand(0, 2),
            'duration_minutes' => rand(0, 59),
            'duration_seconds' => rand(0, 59),
            'views' => rand(0, 1000),
            'url' => $this->faker->url,
            'course_id' => \App\Models\Course::factory(),
        ];
    }
}
