<?php

namespace Database\Seeders;

use App\Models\PackageFaq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageFaqs = [
            [
                'question' => 'Is travel insurance included?',
                'answer' => 'No, travel insurance is not included, but we highly recommend purchasing one before the trip.',
                'package_id' => 2
            ],
            [
                'question' => 'Are meals included in the package?',
                'answer' => 'Breakfast is included, but lunch and dinner are not covered unless specified.',
                'package_id' => 2
            ],
            [
                'question' => 'What is the cancellation policy?',
                'answer' => 'Cancellations made 7 days before departure are eligible for a 50% refund. No refund for cancellations within 7 days.',
                'package_id' => 3
            ],
            [
                'question' => 'Can I customize my itinerary?',
                'answer' => 'Yes, we offer custom itinerary options for an additional cost.',
                'package_id' => 3
            ],
            [
                'question' => 'What type of accommodation is provided?',
                'answer' => 'We provide 3-star and 4-star hotel accommodations, with an option to upgrade upon request.',
                'package_id' => 4
            ],
            [
                'question' => 'Is airport pickup included?',
                'answer' => 'Yes, airport pickup and drop-off services are included in the package.',
                'package_id' => 5
            ],
        ];

        PackageFaq::insert($packageFaqs);

    }
}
