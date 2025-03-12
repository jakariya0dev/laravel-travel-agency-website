<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        // dd($sliders);
        return view("admin.slider.index" , compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',   
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() .'.'. strtolower($photo->getClientOriginalExtension());
            $path = public_path('uploads/admin/sliders');
            $request->file('photo')->move($path, $filename);
        }

        $slider = Slider::create([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'photo' => $filename,
        ]);

        return redirect()->route('slider.index')->with('success','Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit' , compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        if($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',   
            ]);

            $photo = $request->file('photo');
            $filename = time() .'.'. strtolower($photo->getClientOriginalExtension());
            $path = public_path('uploads/admin/sliders');
            $request->file('photo')->move($path, $filename);

            if(file_exists(public_path('uploads/admin/sliders/'.$request->photo))){
                unlink(public_path('uploads/admin/sliders/'.$request->photo));
            }

            $slider->photo = $filename;
        }

        if($request->heading){
            $slider->heading = $request->heading;
        }
        if($request->sub_heading){
            $slider->sub_heading = $request->sub_heading;
        }
        if($request->button_text){
            $slider->button_text = $request->button_text;
        }
        if ($request->button_link) {
            $slider->button_link = $request->button_link;
        }

        $slider->update();
        return redirect()->route('slider.index')->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $slider = Slider::find($id);

        // dd($slider);
        
        if($slider){

            if ($slider->photo && file_exists(public_path('uploads/admin/sliders/'.$slider->photo))) {
                unlink(public_path('uploads/admin/sliders/'.$slider->photo));
            }

            $slider->delete();

            return redirect()->route('slider.index')->with('success','Slider Deleted Successfully');

        }

        return back()->with('error','Slider Not Found');


    }
}
