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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('Name'); // Use lowercase "string"
            $table->decimal('Price', 10, 2); // Define decimal precision and scale
            $table->string('Condition');
            // Assuming 'id' is the primary key of 'users' table; adjust if needed.
            $table->string('contact_number');
            $table->foreign('contact_number')
                ->references('contact_number') // Reference the primary key of 'users' table
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('location');
            $table->foreign('location')
                ->references('location') // Reference the primary key of 'users' table
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
