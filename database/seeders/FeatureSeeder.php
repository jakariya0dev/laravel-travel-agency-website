<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'icon_1' => '<i class="fas fa-briefcase"></i>',
            'icon_2' => '<i class="fas fa-search"></i>',
            'icon_3' => '<i class="fas fa-share-alt"></i>',
            'title_1' => 'Explore Destinations',
            'title_2' => 'Custom Travel Packages',
            'title_3' => 'Travel Deals & Discounts',
            'subtitle_1' => '1 Discover amazing places to visit, from bustling cities to serene beaches, and plan your perfect adventure with our expert guides.',
            'subtitle_2' => '2 Discover amazing places to visit, from bustling cities to serene beaches, and plan your perfect adventure with our expert guides.',
            'subtitle_3' => '3 Discover amazing places to visit, from bustling cities to serene beaches, and plan your perfect adventure with our expert guides.',
            
        ]);
    }
}
