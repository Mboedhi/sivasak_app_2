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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('vendor_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->string('rekanan');
            $table->string('company_name');
            $table->string('NIB');
            $table->string('address');
            $table->string('NPWP');
            $table->string('NPWP_address');
            $table->string('business_type');
            $table->string('leader_name');
            $table->string('contact_person');
            $table->string('item_type');
            $table->string('payment_address');
            $table->string('bank');
            $table->string('acc_num');
            $table->string('behalf');
            $table->enum('status', ['accepted', 'rejected', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
