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
        Schema::create('common_files', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->string('table_row_id')->nullable();
            $table->string('file_slug')->nullable();
            $table->tinyText('file_path');
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
        Schema::dropIfExists('common_files');
    }
};
