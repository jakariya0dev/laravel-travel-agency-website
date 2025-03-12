<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function aboutEdit(){

        $about = About::first();
        return view("admin.about.edit", compact('about'));
    }

    public function aboutUpdate(Request $request){
        $about = About::first();

        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'video_link'=> 'required',
            'status'=> 'required',
        ]);

        $about->title = $request->title;
        $about->description = $request->description;
        $about->video_link = $request->video_link;
        $about->status = $request->status;

        if($request->hasFile('photo')){

            $request->validate([
                'photo'=> 'image|mimes:jpg,jpeg,png'
            ]);

            $image = $request->file('photo');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/about'), $filename);

            $about->photo = $filename;
        }

        $about->update();

        return back()->with('success','About Updated Successfully');
    }

}
