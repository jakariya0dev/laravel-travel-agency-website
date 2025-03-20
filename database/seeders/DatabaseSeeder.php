<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call(AdminSeeder::class);
        // $this->call(AboutSeeder::class);
        // $this->call(FeatureSeeder::class);
        // $this->call(ReviewSeeder::class);
        // $this->call(SliderSeeder::class);
        // $this->call(BlogCategorySeeder::class);
        // $this->call(FaqSeeder::class);
        // $this->call(BlogPostSeeder::class);
        // $this->call(DestinationSeeder::class);
        // $this->call(DestinationPhotoSeeder::class);
        // $this->call(DestinationVideoSeeder::class);
        $this->call(TourPackageSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
