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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('submission_date')->nullable();
            $table->string('submission_file')->nullable();
            $table->text('submission_text')->nullable();
            $table->string('grade')->nullable();
            $table->text('comment')->nullable();
            $table->enum('status', ['submitted', 'graded', 'pending'])->default('pending');
            $table->boolean('is_late')->default(false);
            $table->boolean('resubmitted')->default(false);
            $table->unsignedBigInteger('user_id');  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('assignment_id');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
