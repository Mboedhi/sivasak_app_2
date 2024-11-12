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
        Schema::table('vehicles', function (Blueprint $table) {
            // Mengubah kolom 'user_id' menjadi nullable
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Mengembalikan kolom 'user_id' menjadi tidak nullable
            $table->foreignId('user_id')->nullable(false)->constrained('users', 'user_id')->onDelete('cascade');
        });
    }
};