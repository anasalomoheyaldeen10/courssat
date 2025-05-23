<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name'=>'البرمجة بلفة php من الصفر',
            'auther_name'=>'أسامة محمد',
            'number_lesson'=>103,
            'duration_hours'=>20,
            'duration_minutes'=>24,
            'duration_seconds'=>7,
            'laungue'=>'عربي',
            'photo'=>'course/zerotohero.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);
       Course::create([
            'name'=>'كورس إنشاء المدارس باستخدام php&laravel',
            'auther_name'=>'سمير جمال',
            'number_lesson'=>59,
            'duration_hours'=>42,
            'duration_minutes'=>17,
            'duration_seconds'=>57,
            'laungue'=>'عربي',
            'photo'=>'course/script.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);
       Course::create([
            'name'=>'كورس إنشاء برامج الفواتير باستخدام php&laravel ',
            'auther_name'=>'سمير جمال',
            'number_lesson'=>32,
            'duration_hours'=>22,
            'duration_minutes'=>34,
            'duration_seconds'=>6,
            'laungue'=>'عربي',
            'photo'=>'course/invoce.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);
        Course::create([
            'name'=>'كورس php من البداية للاحتراف',
            'auther_name'=>'أسامة محمد',
            'number_lesson'=>30,
            'duration_hours'=>6,
            'duration_minutes'=>19,
            'duration_seconds'=>41,
            'laungue'=>'عربي',
            'photo'=>'coruse/profecinal.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);
        Course::create([
            'name'=>'برمجة الويب باستخدام إطار العمل laravel 5.5',
            'auther_name'=>'محمد عيسى ',
            'number_lesson'=>103,
            'duration_hours'=>48,
            'duration_minutes'=>26,
            'duration_seconds'=>52,
            'laungue'=>'عربي',
            'photo'=>'course/5.5.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);
        Course::create([
            'name'=>'البرمجة الكائنية بلغة php ',
            'auther_name'=>' محمد عيسى ',
            'number_lesson'=>24,
            'duration_hours'=>3,
            'duration_minutes'=>36,
            'duration_seconds'=>26,
            'laungue'=>'عربي',
            'photo'=>'course/oop.png',
            'url'=>'https://laravel.com/docs/10.x/installation',
            'description'=>'الكورس الأفضل في العالم',
            'category_id'=>'4'
        ]);

    }
}
