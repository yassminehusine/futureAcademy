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
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->string('pract_mark')->nullable();
            $table->string('total_mark')->nullable();
            $table->string('test_mark')->nullable();
            $table->year('year'); 
            $table->enum('grade',['A+','A','B+','B','C+','C','D+','D','F'])->nullable();
            $table->string('group_number')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_courses');
    }
};
