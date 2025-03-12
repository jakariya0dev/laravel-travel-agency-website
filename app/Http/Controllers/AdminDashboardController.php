<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function viewDashboard(){
        return view('admin.dashboard');
    }


}
