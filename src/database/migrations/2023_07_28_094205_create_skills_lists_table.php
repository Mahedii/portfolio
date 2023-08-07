<?php

use App\Models\Skills\SkillsList;
use Illuminate\Support\Facades\Schema;
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
        Schema::create('skills_lists', function (Blueprint $table) {
            $table->id();
            $table->string('skill_name');
            $table->text('skill_description')->nullable();
            $table->string('icon_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        SkillsList::create(['skill_name' => 'PHP', 'slug' => 'PHP', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills_lists');
    }
};
