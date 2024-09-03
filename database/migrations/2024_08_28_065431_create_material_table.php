<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('material', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Title of the material
            $table->text('description')->nullable();  // Description of the material
            $table->string('file_path')->nullable();  // File path for the uploaded material
            $table->string('thumbnail_path')->nullable();  // Thumbnail image (for videos/images)
            $table->unsignedBigInteger('user_id');  // User ID of the creator of the material
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // Relationship with users table
            $table->unsignedBigInteger('courses_id');
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
