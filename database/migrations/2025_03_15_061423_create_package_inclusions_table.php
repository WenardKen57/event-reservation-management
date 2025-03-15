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
        Schema::create('package_inclusions', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable(true);
            $table->string('item_name')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_inclusions');
    }
};
