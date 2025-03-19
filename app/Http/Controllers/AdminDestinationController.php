<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Str;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view("admin.destination.index", compact("destinations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.destination.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img_path = 'uploads/admin/destination/';

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'featured_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        $data = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'visa' => $request->input('visa'),
            'language' => $request->input('language'),
            'currency' => $request->input('currency'),
            'activity' => $request->input('activity'),
            'visit_time' => $request->input('visit_time'),
            'safety' => $request->input('safety'),
            'area' => $request->input('area'),
            'time_zone' => $request->input('time_zone'), // Default view_count to 0 if not provided
            'map_link' => $request->input('map_link'), // Default view_count to 0 if not provided
        ];

        // Handle image upload
        if ($request->hasFile('featured_photo')) {

            // Store new image
            $image = $request->file('featured_photo');
            $imageName = time() . '.' . strtolower($image->getClientOriginalExtension());
            $image->move($img_path, $imageName);

            // Set new image name in request data
            $data['featured_photo'] = $imageName;

        }

        
        // add destination data
        Destination::create($data);
        return redirect()->route('destinations.index')->with('success','Data Added Successfully');
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
        $destination = Destination::find($id);
        return view("admin.destination.edit", compact("destination"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $img_path = 'uploads/admin/destination/';

        // Validate the request data
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'featured_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the destination by ID
        $destination = Destination::find($id);
        

        // Check if destination exists
        if (!$destination) {
            return redirect()->route('destinations.index')->with('error','Destination not found');
        }

            $data = [
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'description' => $request->input('description'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'visa' => $request->input('visa'),
                'language' => $request->input('language'),
                'currency' => $request->input('currency'),
                'activity' => $request->input('activity'),
                'visit_time' => $request->input('visit_time'),
                'safety' => $request->input('safety'),
                'area' => $request->input('area'),
                'time_zone' => $request->input('time_zone'), // Default view_count to 0 if not provided
                'map_link' => $request->input('map_link'), // Default view_count to 0 if not provided
            ];

        // Handle image upload
        if ($request->hasFile('featured_photo')) {

            // Delete old image if it exists
            if ($destination->featured_photo) {
                if (file_exists(public_path($img_path. $destination->featured_photo))) {
                    unlink(public_path($img_path. $destination->featured_photo));
                }
            }

            // Store new image
            $image = $request->file('featured_photo');
            $imageName = time() . '.' . strtolower($image->getClientOriginalExtension());
            $image->move($img_path, $imageName);

            // Set new image name in request data
            $data['featured_photo'] = $imageName;

        }

        
        // Update destination data
        $destination->update($data);

        return redirect()->route('destinations.index')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img_path = 'uploads/admin/destination/';

        $destination = Destination::find($id);
        if (file_exists(public_path($img_path.$destination->featured_photo))) {
            unlink(public_path($img_path.$destination->featured_photo));
        }
        $destination->delete();

        return redirect()->route('destinations.index')->with('success','Successfully Deleted');
    }
}
