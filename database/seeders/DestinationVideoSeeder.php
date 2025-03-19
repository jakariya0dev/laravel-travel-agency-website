<?php

namespace Database\Seeders;

use App\Models\DestinationVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data for destination video
        $data = [
            [
                'destination_id' => 1,
                'video_url' => 'https://www.youtube.com/embed/your_video_id9',
            ],
            [
                'destination_id' => 2,
                'video_url' => 'https://www.youtube.com/embed/your_video_id8'
            ],
            [
                'destination_id' => 3,
                'video_url' => 'https://www.youtube.com/embed/your_video_id7'
            ],
            [
                'destination_id' => 4,
                'video_url' => 'https://www.youtube.com/embed/your_video_id6'
            ],
            [
                'destination_id' => 5,
                'video_url' => 'https://www.youtube.com/embed/your_video_id5'
            ],
        ];

        // insert data
        DestinationVideo::insert($data);
    }
}
