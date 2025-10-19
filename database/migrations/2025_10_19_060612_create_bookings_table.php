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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique();
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone');
            $table->foreignId('room_category_id')->constrained()->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('total_nights');
            $table->decimal('base_price', 10, 2);
            $table->decimal('weekend_surcharge', 10, 2)->default(0);
            $table->decimal('consecutive_discount', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['confirmed', 'cancelled', 'completed'])->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
