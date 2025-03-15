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
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->string('event_name', 255)->nullable(false);
            $table->date('event_date')->nullable(false);
            $table->time('event_time')->nullable(false);
            $table->enum('event_type', ['wedding', 'birthday', 'other'])->nullable(true);
            $table->integer('guest_count')->nullable(false);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->decimal('total_price', total:10, places: 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events'); // Now drop the users table
        
        Schema::dropIfExists('users'); // Now drop the users table

    }
};
