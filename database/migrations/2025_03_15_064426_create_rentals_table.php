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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 255)->nullable(false);
            $table->enum('category', ['scaffold', 'table', 'chair', 'fabric', 'kitchen', 'backdrop', 'others'])
            ->nullable(false);
            $table->decimal('price_per_unit', total:10, places:2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
