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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(true);
            $table->string('event_name')->nullable(false);
            $table->date('event_date')->nullable(false);
            $table->time('event_time')->nullable(false);
            $table->enum('event_type', ['wedding', 'birthday', 'other'])->nullable(true);
            $table->integer('package_id')->nullable(true);
            $table->integer('meal_package_id')->nullable(true);
            $table->integer('guest_count')->nullable(false);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->decimal('total_price', places: 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
