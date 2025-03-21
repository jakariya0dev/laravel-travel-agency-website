<?php

namespace Database\Seeders;

use App\Models\PackagePhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagePhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packagePhotos = [
            [
                'id' => 1,
                'photo' => 'package1_1.jpg',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'photo' => 'package1_2.jpg',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'photo' => 'package1_1.jpg',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'photo' => 'package1_1.jpg',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'photo' => 'package1_2.jpg',
                'package_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PackagePhoto::insert($packagePhotos);

    }
}
