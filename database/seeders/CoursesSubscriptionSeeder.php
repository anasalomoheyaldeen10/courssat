<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CoursesSubscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoursesSubscription::create([
              'user_id'=>1,
              'course_id'=>1
        ]);
        CoursesSubscription::create([
            'user_id'=>1,
            'course_id'=>2
      ]);
      CoursesSubscription::create([
        'user_id'=>2,
        'course_id'=>3
  ]);
    }
}
