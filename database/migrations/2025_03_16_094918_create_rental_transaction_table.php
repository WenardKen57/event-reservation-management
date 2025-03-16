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
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->foreignId('rentals_id')->constrained()->cascadeOnDelete();
            $table->date('rental_date');
            $table->date('return_date');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental_transactions', function (Blueprint $table) {
            $table->dropForeign(['rentals_id']); // Corrected rentals_id -> rental_id
            $table->dropForeign(['users_id']); // Drop user foreign key as well
            $table->dropColumn(['rentals_id', 'users_id']); // Drop both columns
        });
    
        Schema::dropIfExists('rental_transactions'); // Now drop the table
    }
};
