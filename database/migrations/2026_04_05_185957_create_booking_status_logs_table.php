<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_status_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('old_status', 50)->nullable();
            $table->string('new_status', 50);
            $table->dateTime('changed_at');
            $table->text('remarks')->nullable();

            $table->foreign('booking_id')->references('booking_id')->on('bookings');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_status_logs');
    }
};