<?php

use App\Models\HeroSection\TypedTexts;
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
        Schema::create('typed_texts', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        TypedTexts::create(['text' => 'Software Engineer', 'slug' => 'software-engineer', 'created_at' => now(),]);
        TypedTexts::create(['text' => 'Freelancer', 'slug' => 'freelancer', 'created_at' => now(),]);
        TypedTexts::create(['text' => 'Learner', 'slug' => 'learner', 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typed_texts');
    }
};
