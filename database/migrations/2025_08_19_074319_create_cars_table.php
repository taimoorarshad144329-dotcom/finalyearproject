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
        Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('features'); // AC, Petrol, Bluetooth, etc.
        $table->string('transmission'); // auto/manual
        $table->string('type'); // sedan, SUV etc.
        // $table->string('fuel');
        $table->integer('seats');
        $table->decimal('price', 10, 2);
        $table->string('image')->nullable();
        // $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};


