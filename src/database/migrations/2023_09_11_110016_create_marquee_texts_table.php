<?php

use Illuminate\Support\Facades\Schema;
use App\Models\MarqueeText\MarqueeText;
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
        Schema::create('marquee_texts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default('0');
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        MarqueeText::create(['name' => 'PHP', 'slug' => 'PHP', 'created_at' => now()]);
        MarqueeText::create(['name' => 'LARAVEL', 'slug' => 'LARAVEL', 'created_at' => now()]);
        MarqueeText::create(['name' => 'REACT', 'slug' => 'REACT', 'created_at' => now()]);
        MarqueeText::create(['name' => 'AJAX', 'slug' => 'AJAX', 'created_at' => now()]);
        MarqueeText::create(['name' => 'JQUERY', 'slug' => 'JQUERY', 'created_at' => now()]);
        MarqueeText::create(['name' => 'API', 'slug' => 'API', 'created_at' => now()]);
        MarqueeText::create(['name' => 'XML', 'slug' => 'XML', 'created_at' => now()]);
        MarqueeText::create(['name' => 'SOAP', 'slug' => 'SOAP', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marquee_texts');
    }
};
