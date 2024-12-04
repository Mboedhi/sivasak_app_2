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
        Schema::create('answer_questioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questions_id')->constrained('master_questioners', 'id');
            $table->foreignId('questioner_id')->constrained('questioners', 'id');
            $table->string('answer');
            $table->string('explanation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_quesioners');
    }
};
