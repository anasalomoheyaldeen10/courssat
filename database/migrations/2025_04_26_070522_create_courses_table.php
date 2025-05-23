<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('auther_name',255);
            $table->string('number_lesson', 255);
            $table->integer('duration_hours');
            $table->integer('duration_minutes');
            $table->integer('duration_seconds');
            $table->string('laungue',255);
            $table->string('url',255);
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
