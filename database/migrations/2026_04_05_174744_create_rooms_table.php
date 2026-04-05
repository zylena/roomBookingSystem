<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->unsignedBigInteger('theme_id');
            $table->string('room_name', 100);
            $table->text('description')->nullable();
            $table->enum('difficulty_level', ['Easy', 'Medium', 'Hard']);
            $table->integer('duration_minutes');
            $table->decimal('price_per_pax', 10, 2);
            $table->integer('max_pax');
            $table->string('image_url', 255)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('theme_id')->references('theme_id')->on('themes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};