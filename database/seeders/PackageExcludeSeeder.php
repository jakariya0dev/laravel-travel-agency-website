<?php

namespace Database\Seeders;

use App\Models\PackageExclude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageExcludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageExcludes = [
            ['title' => 'Visa Fees', 'package_id' => 2],
            ['title' => 'Travel Insurance', 'package_id' => 2],
            ['title' => 'Alcoholic Beverages', 'package_id' => 3],
            ['title' => 'Additional Sightseeing Tours', 'package_id' => 3],
            ['title' => 'Medical Expenses', 'package_id' => 4],
            ['title' => 'Extra Hotel Stay', 'package_id' => 5],
        ];

        PackageExclude::insert($packageExcludes);

    }
}
