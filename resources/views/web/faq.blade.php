
@extends('web.layouts.master')

@section('main-content')

        <div class="page-top" style="background-image: url('uploads/banner.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>FAQ</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">FAQ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq pt_70 pb_40">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item mb_30">
                                <h2 class="accordion-header" id="heading_1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                                        How to book a travel package online?
                                    </button>
                                </h2>
                                <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        To book a travel package online, browse through our website’s offerings, select your desired destination and dates, and follow the prompts to customize your trip. Once you have chosen your options, proceed to the checkout page, enter your details, and make the payment securely. You will receive a confirmation email with your itinerary and booking details.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb_30">
                                <h2 class="accordion-header" id="heading_2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                        What is included in travel packages?
                                    </button>
                                </h2>
                                <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Our travel packages typically include accommodation, transportation, and selected activities or tours. Some packages may also offer meals, travel insurance, and airport transfers. Each package is designed to provide a comprehensive travel experience, but you can always customize your package to include additional services or specific requests. Please check the package details for exact inclusions.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb_30">
                                <h2 class="accordion-header" id="heading_3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                                        Are there any travel discounts available?
                                    </button>
                                </h2>
                                <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes, we offer various travel discounts throughout the year, including early bird specials, last-minute deals, and seasonal promotions. To stay updated on our latest discounts, subscribe to our newsletter, follow us on social media, or check the “Deals” section of our website. We aim to provide affordable travel options without compromising quality.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb_30">
                                <h2 class="accordion-header" id="heading_4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                        How to cancel or modify bookings?
                                    </button>
                                </h2>
                                <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        To cancel or modify a booking, log into your account on our website and go to the “My Bookings” section. Here, you can view your current reservations and follow the prompts to make changes or cancellations. Please note that cancellation policies and modification fees may apply, depending on the terms and conditions of your booking. Contact our customer support for assistance if needed.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
