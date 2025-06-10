<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            MainCategorySeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,  // Seeder للدورات
            UserSeeder::class,    // Seeder للمستخدمين
            LessonSeeder::class,  // Seeder للدروس
            CommentSeeder::class, // Seeder للتعليقات
            CourseReviewSeeder::class, // Seeder للتقييمات
            FavouriteCourseSeeder::class,
            CoursesSubscriptionSeeder::class, // Seeder للتسجيلات في الدورات
            // أضف هنا باقي السييدرز إذا كان لديك
            TestSeeder::class ,
        ]);
    }
}
