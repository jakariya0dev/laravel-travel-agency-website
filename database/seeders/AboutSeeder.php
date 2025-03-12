<?php

namespace Database\Seeders;

use App\Models\Admin\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Welcome to TripSummit',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.',
            'button_text' => 'Read More',
            'button_link' => '#',
            'photo' => 'about.jpg',
            'video_link' => 'https://www.youtube.com/watch?v=JgHfx2v9zOU',
            'status' => 'show',
        ]);

    }
}
