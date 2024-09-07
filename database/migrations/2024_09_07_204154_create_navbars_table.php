<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navbars', function (Blueprint $table) {

            $table->id();
            $table->string('logo');
            $table->enum(
                'position',
                ['top', 'bottom']
            );
            $table->enum('alignment', ['left', 'center', 'right']);
            $table->json('links');
            $table->string('active_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbars');
    }
};
