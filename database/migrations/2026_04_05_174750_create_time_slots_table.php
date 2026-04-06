<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id('slot_id');
            $table->unsignedBigInteger('room_id');
            $table->date('slot_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('availability_status', ['available', 'reserved', 'booked', 'unavailable'])->default('available');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('room_id')->references('room_id')->on('rooms');
            $table->unique(['room_id', 'slot_date', 'start_time'], 'unique_room_date_time');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};