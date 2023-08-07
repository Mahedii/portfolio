<?php

use Illuminate\Support\Facades\Schema;
use App\Models\SocialMedia\SocialMedia;
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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('url');
            $table->string('icon_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        SocialMedia::create(['name' => 'FB', 'url' => 'facebook.com', 'slug' => 'FB', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_media');
    }
};
