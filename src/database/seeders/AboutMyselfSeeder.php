<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutMe\AboutMyself;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutMyselfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutMyself::create([
            'title' => 'Time Tag Watch.',
            'subtitle' => 'Sometimes, we need to check the time, wondering when our work or meeting will finish, without getting caught by others.',
            'description' => 'Loren Ipsum dolor',
            'slug' => 'about-me',
            'created_at' => now()
        ]);
    }
}
