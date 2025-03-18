<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'title' => 'What is Laravel?',
                'description' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern.',
            ],
            [
                'title' => 'What is the latest version of Laravel?',
                'description' => 'The latest version of Laravel is 9.x.',
            ],
            [
                'title' => 'What is the Laravel Eloquent?',
                'description' => 'Eloquent is Laravel’s built-in ORM (Object-relational mapping) implementation. It is an advanced PHP implementation of the active record pattern that allows you to perform database operations on your database tables using a simple and expressive syntax.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
