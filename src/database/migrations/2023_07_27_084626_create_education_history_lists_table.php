<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\EducationHistory\EducationHistoryList;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_history_lists', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name');
            $table->string('degree');
            $table->string('year');
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        EducationHistoryList::create(['institute_name' => 'ADL', 'degree' => 'JSE', 'year' => '7 month', 'slug' => 'ADL', 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_history_lists');
    }
};
