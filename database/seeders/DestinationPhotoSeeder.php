<?php

namespace Database\Seeders;

use App\Models\DestinationPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make 10 destinationsPhotos Data with faker
        $destinationPhotos = [
            
            [
                'photo_name' => 'destination1.jpg',
                'destination_id' => 1,
            ],
            [
                'photo_name' => 'destination2.jpg',
                'destination_id' => 2,
            ],
            [
                'photo_name' => 'destination3.jpg',
                'destination_id' => 3,
            ],
            [
                'photo_name' => 'destination4.jpg',
                'destination_id' => 4,
            ],
            [
                'photo_name' => 'destination5.jpg',
                'destination_id' => 5,
            ],

        ];
        
        
        foreach($destinationPhotos as $destinationPhoto) {
            DestinationPhoto::create($destinationPhoto);
        }
    }
}
