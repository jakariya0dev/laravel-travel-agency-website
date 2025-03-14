<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Feature;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

        $sliders = Slider::get();
        $about = About::first();
        $feature = Feature::first();
        $reviews = Review::get();
        return view("web.home", compact('sliders', 'about', 'feature', 'reviews'));
    }
}
