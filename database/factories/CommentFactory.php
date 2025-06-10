<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desccription' => collect([
    'هذا منتج رائع يوفر لك جميع المزايا التي تحتاجها.',
    'خدمة مميزة وسريعة تلبي جميع احتياجاتك.',
    'جودة عالية وأسعار مناسبة لجميع العملاء.',
    'حل مثالي لتطوير أعمالك وتحقيق النجاح.',
    'نوفر لك تجربة فريدة ومتكاملة بكل سهولة.',
])->random(),
            'lesson_id' => \App\Models\Lesson::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
