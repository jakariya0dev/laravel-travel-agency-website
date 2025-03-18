<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            "heading"=> "Trip to Nice Cities",
            "sub_heading"=> "Exploring vibrant cities, immersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.",
            "photo"=> "slider-1.jpg",
            "button_text"=> "Read More",
            "button_link"=> "#",
        ]);

        Slider::create([
            "heading"=> "Hire Quality Cars",
            "sub_heading"=> "Emmersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.",
            "photo"=> "slider-2.jpg",
            "button_text"=> "Read More",
            "button_link"=> "#",
        ]);
    }
}
