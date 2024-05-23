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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->string('name');
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->unsignedBigInteger('id_country');
            $table->unsignedBigInteger('id_state');
            $table->unsignedBigInteger('id_city');
            $table->string('pincode')->nullable();
            $table->timestamps();

            $table->foreign('id_customer')->references('id')->on('customers');
            $table->foreign('id_country')->references('id')->on('countries');
            $table->foreign('id_state')->references('id')->on('states');
            $table->foreign('id_city')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};