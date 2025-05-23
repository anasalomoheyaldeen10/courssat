<?php

namespace Database\Seeders;

use App\Models\CourseReview;
use App\Models\CoursesSubscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseReview::create([
            'rating'=>3.5,
            'description'=>'الكورس الأقوى',
            'number'=>1,
            'course_id'=>1,
            'user_id'=>1,
        ]);
        CourseReview::create([
            'rating'=>2.5,
            'description'=>'أنصح بمتابعة هذا الكورس',
            'number'=>2,
            'course_id'=>2,
            'user_id'=>1,
        ]);
        CourseReview::create([
            'rating'=>4.5,
            'description'=>'يحوي الكورس على الأمثلة ',
            'number'=>3,
            'course_id'=>3,
            'user_id'=>1,
        ]);
    }
}
