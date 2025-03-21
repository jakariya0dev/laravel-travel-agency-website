<?php

namespace Database\Seeders;

use App\Models\PackageInclude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageIncludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageIncludes = [
            ['title' => 'Daily Breakfast & Dinner', 'package_id' => 2],
            ['title' => 'City Sightseeing Tour', 'package_id' => 2],
            ['title' => 'Adventure Activities', 'package_id' => 3],
            ['title' => 'Local Guide Assistance', 'package_id' => 3],
            ['title' => 'Transportation Between Cities', 'package_id' => 4],
            ['title' => 'Complimentary Spa Session', 'package_id' => 5],
        ];

        PackageInclude::insert($packageIncludes);

    }
}
