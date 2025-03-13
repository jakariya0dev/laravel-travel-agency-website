<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
                'name' => 'John Doe',
                'designation' => 'CEO, ABC Corporation',
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'photo' => 'review-1.jpg'
            ]);
        Review::create([
                'name' => 'John Smith',
                'designation' => 'COO, ABC Corporation',
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'photo' => 'review-3.jpg'
            ]);

            Review::create([
                'name' => 'Jane Doe',
                'designation' => 'CTO, ABC Corporation',
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'photo' => 'review-2.jpg'
            ]);
    }
}
