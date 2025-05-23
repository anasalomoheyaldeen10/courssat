<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'name'=>'php introduction',
            'course_id'=>1,
            'number'=>1,
            'duration_hours'=>0,
            'duration_minutes'=>8,
            'duration_seconds'=>38,
            'url'=>'https://youtu.be/Qk3qmUNUQiw'
        ]);
       Lesson::create([
            'name'=>'php installtion',
            'course_id'=>1,
            'number'=>2,
            'duration_hours'=>0,
            'duration_minutes'=>8,
            'duration_seconds'=>17,
            'url'=>'https://youtu.be/UoQTTn4dLvY'
        ]);
       Lesson::create([
            'name'=>'php Variables',
            'course_id'=>1,
            'number'=>3,
            'duration_hours'=>0,
            'duration_minutes'=>19,
            'duration_seconds'=>55,
            'url'=>'https://youtu.be/RIFWOX6uphE'
        ]);
        Lesson::create([
            'name'=>'php data types',
            'course_id'=>1,
            'number'=>4,
            'duration_hours'=>0,
            'duration_minutes'=>4,
            'duration_seconds'=>57,
            'url'=>'https://youtu.be/vsLXwpEctf8'
        ]);
        Lesson::create([
            'name'=>'php constans',
            'course_id'=>1,
            'number'=>5,
            'duration_hours'=>0,
            'duration_minutes'=>4,
            'duration_seconds'=>40,
            'url'=>'https://youtu.be/AajSUUKyq6k'
        ]);
    }
}
