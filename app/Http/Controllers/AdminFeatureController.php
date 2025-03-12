<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function featureEdit(){

        $feature = Feature::first();
        return view("admin.feature.edit", compact('feature'));
    }

    public function featureUpdate(Request $request){

        $feature = Feature::first();

        $request->validate([
            'icon_1'=> 'required',
            'icon_2'=> 'required',
            'icon_3'=> 'required',
            'title_1'=> 'required',
            'title_2'=> 'required',
            'title_3'=> 'required',
            'subtitle_1'=> 'required',
            'subtitle_2'=> 'required',
            'subtitle_3'=> 'required',
        ]);

        $feature->icon_1 = $request->icon_1;
        $feature->icon_2 = $request->icon_2;
        $feature->icon_3 = $request->icon_3;
        $feature->title_1 = $request->title_1;
        $feature->title_2 = $request->title_2;
        $feature->title_3 = $request->title_3;
        $feature->subtitle_1 = $request->subtitle_1;
        $feature->subtitle_2 = $request->subtitle_2;
        $feature->subtitle_3 = $request->subtitle_3;

        $feature->update();

        return back()->with('success','Feature Updated Successfully');
    }
}
