<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ContactMe\ContactMeInformation;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_me_information', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('slug')->unique();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->timestamps();
        });
        ContactMeInformation::create(['phone' => '+8801623421591', 'email' => 'mahediihasan220@gmail.com', 'address' => 'Bangladesh', 'slug' => 'contact-me-information', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_me_information');
    }
};
