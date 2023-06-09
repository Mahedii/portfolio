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
            $table->timestamps();
        });
        HeroSection::create(['name' => 'Mahadi','quote' => 'Architecture is the learned game', 'created_at' => now(),]);
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