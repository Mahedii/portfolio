<?php

use Illuminate\Support\Facades\Schema;
use App\Models\WorkHistory\WorkHistory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_histories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('title_description');
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        WorkHistory::create(['title' => 'Work Experience', 'title_description' => 'Architecture is the learned game', 'slug' => 'work_histories_data', 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_histories');
    }
};
