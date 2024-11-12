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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->string('vehicle_plate');
            $table->string('vehicle_type');
            $table->string('year');
            $table->string('vehicle_registration');
            $table->date('vehicle_tax');
            $table->date('registration_expired');
            $table->date('head_cover_date');
            $table->date('tail_cover_date');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
