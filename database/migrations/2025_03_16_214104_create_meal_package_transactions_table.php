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
        Schema::create('meal_package_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_package_id')->constrained()->onDelete('cascade'); // Meal package ID
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental_transactions', function (Blueprint $table) {
            $table->dropForeign('meal_package_id');
        });

        Schema::dropIfExists('meal_package_transactions');
    }
};
