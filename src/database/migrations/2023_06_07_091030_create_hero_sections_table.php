<?php

use App\Models\HeroSection\HeroSection;
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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('quote');
            $table->tinyText('file_path');
            $table->text('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        HeroSection::create(['name' => 'Mahadi', 'quote' => 'Architecture is the learned game', 'file_path' => 'file_path.ext', 'slug' => 'hero_sections_data', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_sections');
    }
};
