<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $reviews = Review::get();
        // dd($Reviews);
        return view("admin.review.index" , compact("reviews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.review.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',   
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() .'.'. strtolower($photo->getClientOriginalExtension());
            $path = public_path('uploads/admin/review');
            $request->file('photo')->move($path, $filename);
        }

        Review::create([
            'name'=> $request->name,
            'designation'=> $request->designation,
            'comment'=> $request->comment,
            'photo' => $filename,
        ]);

        return redirect()->route('review.index')->with('success','Review Added Successfully');
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
        $review = Review::findOrFail($id);
        return view('admin.review.edit' , compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $review = Review::findOrFail($id);

        if($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',   
            ]);

            $photo = $request->file('photo');
            $filename = time() .'.'. strtolower($photo->getClientOriginalExtension());
            $path = public_path('uploads/admin/review');
            $request->file('photo')->move($path, $filename);

            if(file_exists(public_path('uploads/admin/review/'.$request->photo))){
                unlink(public_path('uploads/admin/review/'.$request->photo));
            }

            $review->photo = $filename;
        }

    
        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->comment = $request->comment;
        $review->update();

        return redirect()->route('review.index')->with('success','Review Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $review = Review::find($id);

        // dd($Review);
        
        if($review){

            if ($review->photo && file_exists(public_path('uploads/admin/review/'.$review->photo))) {
                unlink(public_path('uploads/admin/review/'.$review->photo));
            }

            $review->delete();

            return redirect()->route('review.index')->with('success','Review Deleted Successfully');

        }

        return back()->with('error','Review Not Found');


    }
}
