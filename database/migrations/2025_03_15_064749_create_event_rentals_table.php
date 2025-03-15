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
        Schema::create('event_rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('events_id')->constrained()->onDelete('cascade');
            $table->foreignId('rentals_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->nullable(false);
            $table->decimal('total_price', total:10, places:2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_rentals');
    }
};
