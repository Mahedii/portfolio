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
        Schema::create('lend_money_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lender_id');
            $table->foreign('lender_id')->references('id')->on('lenders')->onDelete('cascade');
            $table->string('lend_date');
            $table->string('possible_return_date')->nullable();
            $table->string('actual_return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lend_money_information');
    }
};
