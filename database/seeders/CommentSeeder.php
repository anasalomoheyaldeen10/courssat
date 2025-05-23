<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'desccription'=>'هذا الدرس احترافي بمعنى الكلمة ',
            'lesson_id'=>1,
            'user_id'=>1
        ]);
        Comment::create([
            'desccription'=>'ياريت يكون الصوت أقوى ',
            'lesson_id'=>1,
            'user_id'=>1
        ]);
        Comment::create([
            'desccription'=>'جودة الفيديو ضعيفة',
            'lesson_id'=>1,
            'user_id'=>1
        ]);
    }
}
