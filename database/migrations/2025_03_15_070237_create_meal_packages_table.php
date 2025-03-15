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
        Schema::create('meal_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->nullable(false);
            $table->decimal('price_per_plate', total:10, places:2)->nullable(false);
            $table->text('included_dishes')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_packages');
    }
};
