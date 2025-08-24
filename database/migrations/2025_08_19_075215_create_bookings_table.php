<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('pickup_location');
            $table->dateTime('pickup_at');

            $table->string('return_location');
            $table->dateTime('return_at');

            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('cnic');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');

            $table->string('driving_license');
            $table->date('license_expiry');
            $table->text('special_requests')->nullable();

            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->decimal('total_amount', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
