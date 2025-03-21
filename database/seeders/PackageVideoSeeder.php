<?php

namespace Database\Seeders;

use App\Models\PackageVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageVideos = [
            [
                'id' => 1,
                'video_link' => 'https://www.example.com/videos/package1_1.mp4',
                'package_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'video_link' => 'https://www.example.com/videos/package1_2.mp4',
                'package_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'video_link' => 'https://www.example.com/videos/package2_1.mp4',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'video_link' => 'https://www.example.com/videos/package3_1.mp4',
                'package_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'video_link' => 'https://www.example.com/videos/package3_2.mp4',
                'package_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PackageVideo::insert($packageVideos);

    }
}
