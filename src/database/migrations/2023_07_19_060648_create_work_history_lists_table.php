<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\WorkHistory\WorkHistoryList;
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
        Schema::create('work_history_lists', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('role');
            $table->string('duration');
            $table->text('role_description');
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        WorkHistoryList::create(['company_name' => 'ADL', 'role' => 'JSE', 'duration' => '7 month', 'role_description' => 'JSA', 'slug' => 'ADL', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_history_lists');
    }
};
