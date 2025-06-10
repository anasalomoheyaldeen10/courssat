<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Comment;
use App\Models\FavouriteCourse;
use App\Models\CoursesSubscription;
use App\Models\CourseReview;
use Faker\Factory as FakerFactory;

class TestSeeder extends Seeder
{
    public function run(): void
    {
         //$faker = FakerFactory::create('ar_SA');

        $mainCategories = MainCategory::factory(10)->create();

        $categories = Category::factory(20)->create([
            'main_category_id' => function () use ($mainCategories) {
                return $mainCategories->random()->id;
            }
        ]);

        $users = User::factory(100)->create();

        $courses = Course::factory(100)->create([
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            }
        ]);

        $lessons = Lesson::factory(100)->create([
            'course_id' => function () use ($courses) {
                return $courses->random()->id;
            }
        ]);

        Comment::factory(100)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
            'lesson_id' => function () use ($lessons) {
                return $lessons->random()->id;
            }
        ]);

        FavouriteCourse::factory(100)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
            'course_id' => function () use ($courses) {
                return $courses->random()->id;
            }
        ]);

        CoursesSubscription::factory(100)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
            'course_id' => function () use ($courses) {
                return $courses->random()->id;
            }
        ]);

        CourseReview::factory(100)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
            'course_id' => function () use ($courses) {
                return $courses->random()->id;
            }
        ]);

        $this->command->info('✅ TestLeghSeeder: تم إدخال البيانات بنجاح.');
    }
}
