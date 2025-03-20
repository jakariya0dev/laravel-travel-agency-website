<?php

namespace Database\Seeders;

use App\Models\TourPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourPackages = [
            [
                'title' => 'Great Barrier Reef Adventure',
                'slug' => 'great-barrier-reef-adventure',
                'description' => 'Explore the stunning coral reefs and marine life of the Great Barrier Reef.',
                'destination_id' => 1,
                'price' => 400.00,
                'original_price' => 700.00,
                'map_link' => 'https://maps.example.com/great-barrier-reef',
                'featured_photo' => 'great-barrier-reef.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Maldives Luxury Escape',
                'slug' => 'maldives-luxury-escape',
                'description' => 'Experience the crystal-clear waters and overwater bungalows in Maldives.',
                'destination_id' => 2,
                'price' => 1200.00,
                'original_price' => 1500.00,
                'map_link' => 'https://maps.example.com/maldives',
                'featured_photo' => 'maldives-luxury.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Swiss Alps Skiing Experience',
                'slug' => 'swiss-alps-skiing-experience',
                'description' => 'Ski across the breathtaking Swiss Alps with guided tours and luxury stays.',
                'destination_id' => 3,
                'price' => 850.00,
                'original_price' => 1000.00,
                'map_link' => 'https://maps.example.com/swiss-alps',
                'featured_photo' => 'swiss-alps-skiing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Amazon Rainforest Expedition',
                'slug' => 'amazon-rainforest-expedition',
                'description' => 'Explore the untouched beauty of the Amazon rainforest with expert guides.',
                'destination_id' => 4,
                'price' => 600.00,
                'original_price' => 750.00,
                'map_link' => 'https://maps.example.com/amazon-rainforest',
                'featured_photo' => 'amazon-rainforest.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Santorini Sunset Getaway',
                'slug' => 'santorini-sunset-getaway',
                'description' => 'Witness the world-famous Santorini sunsets from a luxury cliffside villa.',
                'destination_id' => 5,
                'price' => 950.00,
                'original_price' => 1100.00,
                'map_link' => 'https://maps.example.com/santorini',
                'featured_photo' => 'santorini-sunset.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        foreach ($tourPackages as $value) {
            TourPackage::create($value);
        }

    }
}
