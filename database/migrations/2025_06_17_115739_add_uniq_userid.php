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
        Schema::table('weatcheds', function (Blueprint $table) {
             $table->unique(['user_id', 'lesson_id'], 'unique_user_lesson');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weatcheds', function (Blueprint $table) {
            //
        });
    }
};
