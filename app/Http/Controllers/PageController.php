<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function faqPageView()
    {
        return view('web.faq');
    }
}
