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
        Schema::create('bank_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->string('name');
            $table->string('account');
            $table->string('titular')->nullable();
            $table->string('branch')->nullable();
            $table->string('ifsc')->nullable();
            $table->timestamps();

            $table->foreign('id_customer')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_customers');
    }
};