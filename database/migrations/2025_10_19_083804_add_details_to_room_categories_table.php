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
        Schema::table('room_categories', function (Blueprint $table) {
            $table->integer('max_guests')->default(2)->after('description');
            $table->integer('bedrooms')->default(1)->after('max_guests');
            $table->integer('bathrooms')->default(1)->after('bedrooms');
            $table->integer('size')->default(400)->after('bathrooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_categories', function (Blueprint $table) {
            $table->dropColumn(['max_guests', 'bedrooms', 'bathrooms', 'size']);
        });
    }
};
