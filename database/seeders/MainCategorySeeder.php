<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainCategory;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            MainCategory::create([
                    'name'=>'قواعد البانات' ,
                    'logo'=>'storage/mainCategory/database.jpg'
            ]);
            MainCategory::create([
                    'name'=>'أمن المعلومات' ,
                    'logo'=>'storage/mainCategory/informationSecurity.jpg'
            ]);
    MainCategory::create([
                    'name'=>'تقنية المعلومات' ,
                    'logo'=>'storage/mainCategory/IT.jpg'
            ]);
            MainCategory::create([
                    'name'=>'البرمجة' ,
                    'logo'=>'storage/mainCategory/database.jpg'
            ]);
            MainCategory::create([
                    'name'=>'اللغات' ,
                    'logo'=>'storage/mainCategory/languge.jpg'
            ]);
            MainCategory::create([
                    'name'=>'الإدارة والاقتصاد' ,
                    'logo'=>'storage/mainCategory/manager.jpg'
            ]);
            MainCategory::create([
                    'name'=>'الشبكات' ,
                    'logo'=>'storage/mainCategory/network.jpg'
            ]);
            MainCategory::create([
                    'name'=>'نظم التشغيل' ,
                    'logo'=>'storage/mainCategory/operationSystem.jpg'
            ]);
            MainCategory::create([
                    'name'=>'البرمجة' ,
                    'logo'=>'storage/mainCategory/programing.jpg'
            ]);
            MainCategory::create([
                    'name'=>'هندسة البرمجيات' ,
                    'logo'=>'storage/mainCategory/software.jpg'
            ]);
            MainCategory::create([
                    'name'=>' تطوير الويب' ,
                    'logo'=>'storage/mainCategory/webdeveloper.jpg'
            ]);
        }
}
