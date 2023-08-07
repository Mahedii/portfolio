<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_myselves', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyText('subtitle');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_myselves');
    }
};
