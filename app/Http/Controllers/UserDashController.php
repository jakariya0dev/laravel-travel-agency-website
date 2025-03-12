<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashController extends Controller
{
    public function DashboardView(){
        return view("web.user.dashboard");
    }


}
