<?php

namespace Database\Seeders;

use App\Models\FavouriteCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouriteCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavouriteCourse::create([
            'user_id' => 1,
            'course_id' => 1
        ]);
        FavouriteCourse::create([
            'user_id' => 1,
            'course_id' => 2
        ]);
        FavouriteCourse::create([
            'user_id' => 2,
            'course_id' => 3
        ]);
    }
}
