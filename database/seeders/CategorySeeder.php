<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'php',
            'logo' => 'storage/category/php.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'database',
            'logo' => 'storage/category/database.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'doucker',
            'logo' => 'storage/category/doucker.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'html',
            'logo' => 'storage/category/html.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'jquery',
            'logo' => 'storage/category/jquery.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'js',
            'logo' => 'storage/category/js.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'kotlin',
            'logo' => 'storage/category/kotlin.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'laravel',
            'logo' => 'storage/category/laravel.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'oracle',
            'logo' => 'storage/category/oracle.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'python',
            'logo' => 'storage/category/python.jpg',
            'main_category_id' => '1',
        ]);
        Category::create([
            'name' => 'vujs',
            'logo' => 'storage/category/vujs.jpg',
            'main_category_id' => '1',
        ]);

    }
}
