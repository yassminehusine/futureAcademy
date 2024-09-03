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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('file_path')->nullable();  // Assignment file (PDF, DOC, etc.)
            //$table->string('image')->nullable();      // Any attached images
            //$table->string('video_url')->nullable();  // Video links if any
            // $table->string('audio_url')->nullable();  // Audio links if any
            $table->unsignedBigInteger('course_id');  // Foreign key to courses table
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('year');  // Foreign key to courses table
            $table->foreign('year')->references('year')->on('user_courses');
            $table->unsignedBigInteger('user_id');    // Foreign key to users table (professor)
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('due_date');
            $table->enum('status', ['overdue' , 'ongoing' ,'completed'])->default('ongoing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
